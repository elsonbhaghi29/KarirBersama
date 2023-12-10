<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Perusahaan;
use App\Models\LowonganModel;
use App\Models\PerusahaanModel;
use App\Models\UserModel;

class LowonganController extends BaseController
{
    public function index()
    {
        $user = new UserModel();
        $userDetail = new PerusahaanModel();

        $id = $user->where('id', session('id'))->first();
        if (!$id) {
            return redirect()->back();
        }

        $data['user'] = $user->where('id', session('id'))->first();
        $data['detail'] = $userDetail->where('id_user', $data['user']['id'])->first();

        return view('perusahaan/lowongan', $data);
    }

    public function postLowongan()
    {
        $validation = \Config\Services::validation();

        $validate = [
            'nama_pekerjaan' => 'required',
            'password' => 'required',
            'deskripsi' => 'required',
            'posisi' => 'required',
            'batas_post' => 'required'
        ];

        if (!$validation->setRules($validate)->run($this->request->getPost())) {
            $errorMessages = $validation->getErrors();

            session()->setFlashdata('error', $errorMessages);
            return redirect()->back()->withInput();
        }

        $user = new UserModel();
        $id = session('id');
        $dataUser = $user->where('id', $id)->first();

        $perusahaan = new PerusahaanModel();
        $id_user = $this->request->getVar('id_user');
        $perusahaanData = $perusahaan->find($id_user);

        if (!$perusahaanData) {
            session()->setFlashdata('error', 'Perusahaan tidak valid!');
            return redirect()->back()->withInput();
        }

        $lowongan = new LowonganModel();
        $status = $this->request->getPost('status');
        $statusValue = 0;
        if($status == 'Open'){
            $statusValue = 1;
        }else{
            $statusValue = 2;
        }
        $inputPassword = $this->request->getVar('password');

        if (password_verify($inputPassword, $dataUser['password'])) {
            $lowongan->insert([
                'id_perusahaan' => $perusahaanData['id'],
                'nama_pekerjaan' => $this->request->getVar('nama_pekerjaan'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'posisi' => $this->request->getVar('posisi'),
                'batas_post' => $this->request->getVar('batas_post'),
                'status' => $statusValue,
            ]);
            session()->setFlashdata('success', 'Lowongan berhasil diposting!');
            return redirect()->to('perusahaan/lowongan/kedua');
        } else {
            session()->setFlashdata('error', 'Password tidak valid!');
            return redirect()->back()->withInput();
        }
    }

    public function listLowongan()
    {
        $user = new UserModel();
        $userDetail = new PerusahaanModel();
        $lowongan = new LowonganModel();

        $id = $user->where('id', session('id'))->first();
        if (!$id) {
            return redirect()->back();
        }

        $data['user'] = $user->where('id', session('id'))->first();
        $data['detail'] = $userDetail->where('id_user', $data['user']['id'])->first();
        $data['lowongan'] = $lowongan->where('id_perusahaan', $data['detail']['id'])->findAll();
        // dd($data['lowongan']);

        return view('perusahaan/daftarLowongan', $data);
    }

    public function editLowongan($id)
    {
        $lowongan = new LowonganModel();
        $user = new UserModel();
        $userDetail = new PerusahaanModel();
        $detail = $lowongan->where('id', $id)->first();

        $data['user'] = $user->where('id', session('id'))->first();
        $data['detail'] = $userDetail->where('id_user', $data['user']['id'])->first();
        $data['lowongan'] = $detail;

        return view('perusahaan/lowonganEdit', $data);
    }

    public function editLowonganProses()
    {
        $validation = \Config\Services::validation();

        $validate = [
            'nama_pekerjaan' => 'required',
            'password' => 'required',
            'deskripsi' => 'required',
            'posisi' => 'required',
            'batas_post' => 'required'
        ];

        if (!$validation->setRules($validate)->run($this->request->getPost())) {
            $errorMessages = $validation->getErrors();

            session()->setFlashdata('error', $errorMessages);
            return redirect()->back()->withInput();
        }

        $user = new UserModel();
        $id = session('id');
        $dataUser = $user->where('id', $id)->first();

        $perusahaan = new PerusahaanModel();
        $id_user = $this->request->getVar('id_user');
        $perusahaanData = $perusahaan->find($id_user);

        if (!$perusahaanData) {
            session()->setFlashdata('error', 'Perusahaan tidak valid!');
            return redirect()->back()->withInput();
        }

        $lowongan = new LowonganModel();
        $status = $this->request->getPost('status');
        $inputPassword = $this->request->getVar('password');
        $idlowongan = $this->request->getVar('id');

        if (password_verify($inputPassword, $dataUser['password'])) {
            $lowongan->update($idlowongan, [
                'id_perusahaan' => $perusahaanData['id'],
                'nama_pekerjaan' => $this->request->getVar('nama_pekerjaan'),
                'deskripsi' => $this->request->getVar('deskripsi'),
                'posisi' => $this->request->getVar('posisi'),
                'batas_post' => $this->request->getVar('batas_post'),
                'status' => $status,
            ]);
            session()->setFlashdata('success', 'Lowongan berhasil diposting!');
            return redirect()->to('perusahaan/daftar/lowongan/kedua');
        } else {
            session()->setFlashdata('error', 'Password tidak valid!');
            return redirect()->back()->withInput();
        }
    }

    public function hapusLowonganProses($id)
    {
        $lowongan = new LowonganModel();
        $detail = $lowongan->find($id); // Mengambil data dengan ID tertentu

        if ($detail) {
            $lowongan->delete($id); // Menghapus data
            return redirect()->back();
        }
    }
}
