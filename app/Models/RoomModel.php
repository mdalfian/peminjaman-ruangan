<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class RoomModel extends Model
{
    protected $db;

    function __construct()
    {
        $this->db = Database::connect();
    }

    function add_room($data)
    {
        return $this->db->table('rooms')->insert($data);
    }

    function get_room()
    {
        return $this->db->table('rooms')->get();
    }

    function remove_room($id)
    {
        return $this->db->table('rooms')->delete(['room_id' => $id]);
    }

    function edit_room($id, $data)
    {
        return $this->db->table('rooms')->update($data, ['room_id' => $id]);
    }
}
