<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\UserModel;
use Config\Database;

class Auth extends BaseController
{
    protected $dataAuth;
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->dataAuth = new AuthModel();
        $this->userModel = new UserModel();
        $this->db = Database::connect();
    }

    public function index(): string
    {
        return view('login');
    }

    public function daftar()
    {
        return view('register');
    }

    public function register()
    {
        $data = [
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('nama'),
            'password' => hash('sha256', $this->request->getPost('password')),
        ];

        $this->userModel->register_user($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Silahkan Login!');
        } else {
            return redirect()->back()->with('error', 'Gagal Mendaftar');
        }
    }

    public function login()
    {
        $username = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $check = $this->dataAuth->auth_user($username, $password)->getRowArray();
        $res = $this->dataAuth->auth_user($username, $password)->getNumRows();

        if ($res > 0) {
            $ses_data = array(
                'email' => $check['email'],
                'nama' => $check['username'],
                'role' => $check['role_id'],
                'isLoggedIn' => TRUE
            );
            session()->set($ses_data);
            if ($check['role_id'] == 1) {
                return redirect()->to(base_url('admin/home'));
            } else {
                return redirect()->to(base_url('user/home'));
            }
        } else {
            session()->setFlashdata('error', 'Email / Password salah');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
