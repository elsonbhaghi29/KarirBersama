<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index(): string
    {
        return view('login/login');
    }

    public function dashboard()
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

        // dd(is_array($dataUser));
        // Verifikasi keberadaan username dan pastikan dataUser adalah objek, bukan array
        if (!empty($dataUser) && is_array($dataUser)) {
            
            // Verifikasi password
            if (password_verify($password, $dataUser['password'])) {
                // Sukses login
                session()->set([
                    'username' => $dataUser['username'],
                    'name' => $dataUser['name'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('/home'));
            } else {
                // Password tidak cocok
                session()->setFlashdata('error', 'Password yang dimasukkan salah');
                return redirect()->back();
            }
        } else {
            // Username tidak ditemukan atau dataUser bukan objek
            session()->setFlashdata('error', 'Username tidak ditemukan');
            return redirect()->back();
        }
    }


    public function register(): string
    {
        return view('login/register');
    }

    public function registerProses()
    {
        $validation = \Config\Services::validation();

        $validate = [
            'username' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirm-password' => 'matches[password]',
            'nama' => 'required|min_length[4]|max_length[100]'
        ];

        if (!$validation->setRules($validate)->run($this->request->getPost())) {
            session()->setFlashdata('error', $validation->getErrors());
            return redirect()->back()->withInput();
        }

        $status = $this->request->getPost('status');

        if ($status === 'perusahaan') {
            $statusValue = 2;
        } elseif ($status === 'pelamar') {
            $statusValue = 3;
        }

        $users = new UserModel();
        $users->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('nama'),
            'status' => $statusValue
        ]);

        return redirect()->to('login');
    }
}
