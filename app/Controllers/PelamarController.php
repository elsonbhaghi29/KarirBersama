<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PelamarModel;
use App\Models\ApplyJobModel;
use App\Models\LowonganModel;
use App\Models\PerusahaanModel;
use App\Controllers\BaseController;

class PelamarController extends BaseController
{
    public function registrasiKedua()
    {
        $data = new UserModel;
        $user = $data->where('id', session('id'))->first();
        return view('pelamar/nextRegis', $user);
    }

    public function registrasiProsesKedua()
    {
        $validation = \Config\Services::validation();

        $validate = [
            'first_name' => 'required|min_length[2]|max_length[50]',
            'last_name' => 'required|min_length[2]|max_length[50]',
            'phone_number' => 'required|min_length[6]|max_length[15]',
            'email' => 'required|valid_email|max_length[100]',
            'address' => 'required|min_length[5]|max_length[255]',
            'tempat_lahir' => 'required|min_length[2]|max_length[50]',
            'tanggal_lahir' => 'required|valid_date'
        ];

        if (!$validation->setRules($validate)->run($this->request->getPost())) {
            session()->setFlashdata('error', $validation->getErrors());
            return redirect()->back()->withInput();
        }

        $agamaOpsi = [
            'katolik' => 1, 'islam' => 2, 'hindu' => 3, 'budha' => 4, 'konghucu' => 5
        ];
        $genderOpsi = [
            'laki' => 1, 'perempuan' => 2
        ];

        $agama = $this->request->getPost('agama');
        $gender = $this->request->getPost('gender');
        $id_user = $this->request->getVar('id_user');

        if (!$id_user) {
            return redirect()->back()->with('error', 'ID pengguna tidak valid');
        }

        $agamaValue = $agamaOpsi[$agama] ?? null;
        $genderValue = $genderOpsi[$gender] ?? null;

        $user = new PelamarModel();
        $user->insert([
            'id_user' => $id_user,
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'gender' => $genderValue,
            'agama' => $agamaValue,
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'phone_number' => $this->request->getVar('phone_number'),
            'email' => $this->request->getVar('email'),
            'address' => $this->request->getVar('address'),
        ]);

        session()->remove('id');
        return redirect()->to(base_url('/login'));
    }

    public function update($username)
    {
        $loggedInUserId = session('id');
        $user = new UserModel();
        $pelamar = new PelamarModel();
        $id = $pelamar->where('id_user', $loggedInUserId)->first();
        $users = $user->where('id', $loggedInUserId)->where('username', $username)->get()->getResult();
        $params = $id['id'];

        if (!$users) {
            session()->setFlashdata('error', 'Username tidak cocok dengan pemilik sesi yang login!');
            return redirect()->back();
        }
        $validation = \Config\Services::validation();

        $validate = [
            'first_name' => 'required|min_length[2]|max_length[50]',
            'last_name' => 'required|min_length[2]|max_length[50]',
            'phone_number' => 'required|min_length[6]|max_length[15]',
            'email' => 'required|valid_email|max_length[100]',
            'address' => 'required|min_length[5]|max_length[255]',
            'tempat_lahir' => 'required|min_length[2]|max_length[50]',
            'tanggal_lahir' => 'required|valid_date'
        ];

        if (!$validation->setRules($validate)->run($this->request->getPost())) {
            session()->setFlashdata('error', $validation->getErrors());
            return redirect()->back()->withInput();
        }

        $agama = $this->request->getPost('agama');
        $gender = $this->request->getPost('gender');
        // dd($agama, $gender);

        $user = new PelamarModel();
        $user->update($params, [
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'gender' => $gender,
            'agama' => $agama,
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'phone_number' => $this->request->getVar('phone_number'),
            'email' => $this->request->getVar('email'),
            'address' => $this->request->getVar('address'),
        ]);
        if ($user->affectedRows() > 0) {
            session()->setFlashdata('success', 'Data berhasil diperbarui!');
            return redirect()->back();
        } else {
            session()->setFlashdata('error', 'Tidak ada perubahan data atau ada kesalahan dalam pembaruan!');
            return redirect()->back();
        }
    }

    public function daftarLowongan()
    {
        $user = new UserModel();
        $lowongan = new LowonganModel();
        $perusahaan = new PerusahaanModel();
        $apply = new ApplyJobModel();

        $data = $user->where('id', session('id'))->first();
        $data['user'] = $user->where('id', session('id'))->first();
        $data['lowongan'] = $lowongan->where('status', 1)->findAll();
        $data['perusahaan'] = $perusahaan->findAll();

        // Ambil data apply sesuai dengan id yang sedang login
        $data['applied_jobs'] = $apply->where('id_user', session('id'))->findAll();

        return view('pelamar/daftarPekerjaan', $data);
    }
}
