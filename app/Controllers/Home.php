<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LowonganModel;
use App\Models\PerusahaanModel;
use App\Controllers\BaseController;
use App\Database\Migrations\ApplyJob;
use App\Models\ApplyJobModel;
use App\Models\PelamarModel;

class Home extends BaseController
{
    public function index()
    {
        if (session('id')) {
            return redirect()->back();
        }
        return view('login/login');
    }

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Validasi input
        if (empty($username) || empty($password)) {
            session()->setFlashdata('error', 'Harap masukkan username dan password');
            return redirect()->back();
        }

        // Ambil data user dari database
        $users = new UserModel();
        $dataUser = $users->where('username', $username)->first();

        if (!empty($dataUser) && is_array($dataUser)) {

            // Verifikasi password
            if (password_verify($password, $dataUser['password'])) {
                $params = ['id' => $dataUser['id']];
                session()->set($params);
                if ($dataUser['status'] == 1) {
                    return redirect()->to(base_url('admin/dashboard'));
                } elseif ($dataUser['status'] == 2) {
                    return redirect()->to(base_url('perusahaan/dashboard'));
                } elseif ($dataUser['status'] == 3) {
                    return redirect()->to(base_url('pelamar/dashboard'));
                }
            } else {
                // Password tidak cocok
                session()->setFlashdata('error', 'Password yang dimasukkan salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->back();
        }
    }

    public function dashboard(): string
    {
        $user = new UserModel();
        $lowongan = new LowonganModel();
        $perusahaan = new PerusahaanModel();
        $apply = new ApplyJobModel();
        $pelamar = new PelamarModel();

        // Ambil data user berdasarkan session('id')
        $data['user'] = $user->where('id', session('id'))->first();

        if (!$data['user']) {
            // Handle jika user tidak ditemukan (sesuai kebutuhan)
            return 'User not found';
        }

        $status = $data['user']['status'];

        switch ($status) {
            case 1:
                $data['pelamar'] = $pelamar->findAll();
                $data['usaha'] = $perusahaan->findAll();
                $data['lowongan'] = $lowongan->findAll();

                return view('admin/dashboardAdmin', $data);
                break;

            case 2:
                $data['detail'] = $perusahaan->where('id_user', $data['user']['id'])->first();
                $data['lowongan'] = $lowongan->where('id_perusahaan', $data['detail']['id'])->findAll();
                $data['apply'] = $apply->findAll();

                // Menambahkan inisialisasi $data untuk mengatasi "Undefined variable $data"
                $data['data'] = $data;

                return view('perusahaan/dashboardPerusahaan', $data);
                break;

            case 3:
                $data['lowongan'] = $lowongan->findAll();
                $data['perusahaan'] = $perusahaan->findAll();
                $data['apply'] = $apply->where('id_user', session('id'))->findAll();
                return view('pelamar/dashboardPelamar', $data);
                break;
            default:
                // Handle jika status tidak sesuai (sesuai kebutuhan)
                return 'Invalid status';
                break;
        }
    }

    public function logout()
    {
        session()->remove('id');
        return redirect()->to(base_url('/login'));
    }
}
