<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class AuthModel extends Model
{
    protected $db;

    function __construct()
    {
        $this->db = Database::connect();
    }

    function auth_user($email, $password)
    {
        return $this->db->table('users')->getWhere(['email' => $email, 'password' => hash('sha256', $password)]);
    }
}
