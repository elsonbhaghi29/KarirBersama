<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Database\Migrations\User;
use App\Models\PelamarModel;
use App\Models\PerusahaanModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $id = $userModel->where('id', session('id'))->first();
        $PelamarModel = new PelamarModel();
        $PerusahaanModel = new PerusahaanModel();

        if ($id['status'] == 2) {
            $data['user'] = $userModel->where('id', session('id'))->first();
            $data['detail'] = $PerusahaanModel->where('id_user', $data['user']['id'])->first();

            return view('perusahaan/profilePerusahaan', $data);
        } elseif ($id['status'] == 3) {
            $data['user'] = $userModel->where('id', session('id'))->first();
            $data['detail'] = $PelamarModel->where('id_user', $data['user']['id'])->first();

            return view('pelamar/profilePelamar', $data);
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
            $errorMessages = $validation->getErrors();

            dd($errorMessages);
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
        $inserted = $users->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('nama'),
            'status' => $statusValue
        ]);

        if ($inserted) {
            $params = ['id' => $users->insertID()];
            session()->set($params);

            $user = new UserModel();
            $detail = $user->where('id', session('id'))->first();

            if ($detail && $detail['status'] == 2) {
                return redirect()->to('registrasi/kedua');
            } elseif ($detail && $detail['status'] == 3) {
                return redirect()->to('registrasi/ketiga');
            }
        }
    }

    public function registrasiadmin()
    {
        return view('login/registerAdmin');
    }

    public function registrasiadminProses()
    {
        $validation = \Config\Services::validation();

        $validate = [
            'username' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirm-password' => 'matches[password]',
            'nama' => 'required|min_length[4]|max_length[100]'
        ];

        if (!$validation->setRules($validate)->run($this->request->getPost())) {
            $errorMessages = $validation->getErrors();

            dd($errorMessages);
            session()->setFlashdata('error', $validation->getErrors());
            return redirect()->back()->withInput();
        }

        $users = new UserModel();
        $inserted = $users->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('nama'),
            'status' => 1
        ]);

        if ($inserted) {
            redirect()->to('login/login');
        }
    }
}
