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

    function get_user()
    {
        return $this->db->table('users')
            ->getWhere(['role_id !=' => 1]);
    }

    function remove_user($id)
    {
        return $this->db->table('users')->delete(['user_id' => $id]);
    }

    function update_user($id, $data)
    {
        return $this->db->table('users')->update($data, ['user_id' => $id]);
    }
}
