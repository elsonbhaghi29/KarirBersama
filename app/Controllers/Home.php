<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        if (session('id')) {
            return redirect()->to(base_url('/home'));
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
                } elseif($dataUser['status'] == 2){
                    return redirect()->to(base_url('perusahaan/dashboard'));
                }elseif($dataUser['status'] == 3){
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
        $data = $user->where('id', session('id'))->first();
        
        if($data['status'] == 1){
            return view('admin/dashboardAdmin');
        }elseif($data['status'] == 2){
            return view('perusahaan/dashboardPerusahaan');
        }elseif($data['status'] == 3){
            return view('pelamar/dashboardPelamar');
        }
    }

    public function logout()
    {
        session()->remove('id');
        return redirect()->to(base_url('/login'));
    }
}
