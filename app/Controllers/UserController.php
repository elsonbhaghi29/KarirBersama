<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{

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
