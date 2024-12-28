<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->userModel = new UserModel;
    }
    public function index(): string
    {
        $data = [
            'title' => 'Home',
        ];

        return view('admin/home', $data);
    }

    public function user()
    {
        $data = [
            'title' => 'User',
            'users' => $this->userModel->get_user()->getResult()
        ];

        return view('admin/user', $data);
    }
}
