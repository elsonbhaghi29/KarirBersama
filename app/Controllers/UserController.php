<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index(): string
    {
        return view('login/register');
    }
}
