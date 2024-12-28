<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use Config\Database;

class UserController extends Controller
{
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->userModel = new UserModel;
        $this->db = Database::connect();
    }

    public function delete_user($id)
    {
        $this->userModel->remove_user($id);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil Hapus User');
        } else {
            return redirect()->back()->with('error', 'Gagal Hapus User');
        }
    }

    public function edit_user($id)
    {
        $user = $this->db->table('users')->getWhere(['user_id' => $id])->getRow();

        $new_pass = $this->request->getPost('password');

        $old_pass = $user->password;

        $data = [
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('nama'),
            'password' => $new_pass == '' ? $old_pass : hash('sha256', $new_pass),
        ];

        $this->userModel->update_user($id, $data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil Edit User');
        } else {
            return redirect()->back()->with('error', 'Gagal Edit User');
        }
    }
}
