<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class UserModel extends Model
{
    protected $db;

    function __construct()
    {
        $this->db = Database::connect();
    }

    function register_user($data)
    {
        return $this->db->table('users')->insert($data);
    }
}
