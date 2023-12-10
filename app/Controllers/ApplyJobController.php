<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LowonganModel;
use App\Models\PerusahaanModel;
use App\Controllers\BaseController;
use App\Models\ApplyJobModel;
use App\Models\PelamarModel;

class ApplyJobController extends BaseController
{
    public function index($id)
    {
        $user = new UserModel();
        $lowongan = new LowonganModel();
        $perusahaan = new PerusahaanModel();
        $pelamar = new PelamarModel();
        $data = $user->where('id', session('id'))->first();
        $lowong = $lowongan->where('id', $id)->first();

        $data['user'] = $user->where('id', session('id'))->first();
        $data['pelamar'] = $pelamar->where('id_user', $data['user']['id'])->first();
        $data['lowongan'] = $lowong;
        $data['perusahaan'] = $perusahaan->where('id', $lowong['id_perusahaan'])->first();

        return view('lamar', $data);
    }

    public function prosesLamar()
    {
        $user = new UserModel();
        $users = $user->where('id', session('id'))->first();
        $inputPassword = $this->request->getVar('password');

        $id_jod = $this->request->getVar('id_job');
        $id_user = $this->request->getVar('id_user');
        $tanggal_apply = $this->request->getVar('tanggal_apply');

        // dd($id_jod, $id_user);

        $apply = new ApplyJobModel();
        if (password_verify($inputPassword, $users['password'])) {
            $apply->insert([
                'id_job' => $id_jod,
                'id_user' => $id_user,
                'tanggal_apply' => $tanggal_apply
            ]);
            session()->setFlashdata('success', 'Berhasil Dilamar!');
            return redirect()->to('pelamar/lowongan/daftar/');
        } else {
            session()->setFlashdata('error', 'Password tidak valid!');
            return redirect()->back()->withInput();
        }
    }

    public function daftarJob()
    {
        $user = new UserModel();
        $apply = new ApplyJobModel();
        $perusahaan = new PerusahaanModel();
        $pelamar = new PelamarModel();
        $lowongan = new LowonganModel();

        $data['user'] = $user->where('id', session('id'))->first();

        if ($data['user']) {
            $data['pelamar'] = $pelamar->where('id_user', $data['user']['id'])->first();

            $data['lowongan'] = $lowongan
                ->select('lowongan.*, perusahaan.*')
                ->join('perusahaan', 'perusahaan.id = lowongan.id_perusahaan')
                ->join('apply_job', 'apply_job.id_job = lowongan.id')
                ->where('apply_job.id_user', $data['user']['id'])
                ->findAll();

            $data['applied_jobs'] = $apply->where('id_user', $data['user']['id'])->findAll();
        }
        // dd($data['applied_jobs'][0]['status']);

        return view('daftarLamar', $data);
    }
}
