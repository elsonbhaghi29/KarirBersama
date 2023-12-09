<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\PerusahaanModel;

class PerusahaanController extends BaseController
{
    public function registrasiKedua()
    {
        $data = new UserModel;
        $user = $data->where('id', session('id'))->first();
        return view('perusahaan/nextRegisPerusahaan', $user);
    }

    public function registrasiProsesKedua()
    {
        $validation = \Config\Services::validation();

        $validate = [
            'nama_perusahaan' => 'required|min_length[2]|max_length[50]',
            'pemilik' => 'required|min_length[2]|max_length[50]',
            'phone_number' => 'required|min_length[6]|max_length[15]',
            'email' => 'required|valid_email|max_length[100]',
            'address' => 'required|min_length[5]|max_length[255]'
        ];

        if (!$validation->setRules($validate)->run($this->request->getPost())) {
            session()->setFlashdata('error', $validation->getErrors());
            return redirect()->back()->withInput();
        }

        $jenisOpsi = [
            'Swasta' => 1, 'Negeri' => 2 
        ];

        $jenis = $this->request->getPost('jenis_perusahaan');
        $id_user = $this->request->getVar('id_user');

        if (!$id_user) {
            return redirect()->back()->with('error', 'ID pengguna tidak valid');
        }

        $jenisValue = 0;
        if($jenis == 'Swasta'){
            $jenisValue = 1;
        } else{
            $jenisValue = 2;
        }

        $user = new PerusahaanModel();
        $user->insert([
            'id_user' => $id_user,
            'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
            'pemilik' => $this->request->getVar('pemilik'),
            'jenis_perusahaan' => $jenisValue,
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
        $userData = $user->where('id', $loggedInUserId)
            ->where('username', $username)
            ->get()
            ->getRow();

        if (!$userData) {
            session()->setFlashdata('error', 'Username tidak cocok dengan pemilik sesi yang login!');
            return redirect()->back();
        }

        $validation = \Config\Services::validation();

        $validationRules = [
            'nama_perusahaan' => 'required|min_length[2]|max_length[50]',
            'pemilik' => 'required|min_length[2]|max_length[50]',
            'phone_number' => 'required|min_length[6]|max_length[15]',
            'email' => 'required|valid_email|max_length[100]',
            'address' => 'required|min_length[5]|max_length[255]'
        ];

        if (!$validation->setRules($validationRules)->run($this->request->getPost())) {
            $errorMessages = $validation->getErrors();
            session()->setFlashdata('error', $errorMessages);
            return redirect()->back()->withInput();
        }

        $jenisOpsi = [
            'Swasta' => 1,
            'Negeri' => 2
        ];

        $jenis = $this->request->getPost('jenis_perusahaan');
        $id_user = $loggedInUserId;

        if (!$id_user) {
            return redirect()->back()->with('error', 'ID pengguna tidak valid');
        }

        $jenisValue = $jenisOpsi[$jenis] ?? null;

        $perusahaanModel = new PerusahaanModel();
        $perusahaanData = $perusahaanModel->where('id_user', $id_user)->get()->getRow();

        $updateData = [
            'id_user' => $id_user,
            'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
            'pemilik' => $this->request->getVar('pemilik'),
            'jenis_perusahaan' => $jenisValue,
            'phone_number' => $this->request->getVar('phone_number'),
            'email' => $this->request->getVar('email'),
            'address' => $this->request->getVar('address'),
        ];

        if ($perusahaanData) {
            $perusahaanModel->update($perusahaanData->id, $updateData);
            if ($perusahaanModel->affectedRows() > 0) {
                session()->setFlashdata('success', 'Data berhasil diperbarui!');
                return redirect()->back();
            } else {
                session()->setFlashdata('error', 'Tidak ada perubahan data atau ada kesalahan dalam pembaruan!');
                return redirect()->back();
            }
        } else {
            $perusahaanModel->insert($updateData);
            if ($perusahaanModel->affectedRows() > 0) {
                session()->setFlashdata('success', 'Data berhasil disimpan!');
                return redirect()->back();
            } else {
                session()->setFlashdata('error', 'Gagal menyimpan data!');
                return redirect()->back();
            }
        }
    }
}
