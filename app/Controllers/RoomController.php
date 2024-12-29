<?php

namespace App\Controllers;

use App\Models\RoomModel;
use CodeIgniter\Controller;
use Config\Database;

class RoomController extends BaseController
{
    protected $roomModel;
    protected $db;

    public function __construct()
    {
        $this->roomModel = new RoomModel;
        $this->db = Database::connect();
    }

    public function insert_room()
    {
        $data = [
            'room_name' => $this->request->getPost('room_name'),
            'location' => $this->request->getPost('location'),
            'capacity' => $this->request->getPost('capacity'),
            'description' => $this->request->getPost('description'),
        ];

        $this->roomModel->add_room($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil menambah Ruangan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah Ruangan');
        }
    }

    public function delete_room($id)
    {
        $this->roomModel->remove_room($id);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil Hapus Ruangan');
        } else {
            return redirect()->back()->with('error', 'Gagal Hapus Ruangan');
        }
    }

    public function update_room($id)
    {
        $data = [
            'room_name' => $this->request->getPost('room_name'),
            'location' => $this->request->getPost('location'),
            'capacity' => $this->request->getPost('capacity'),
            'description' => $this->request->getPost('description'),
        ];

        $this->roomModel->edit_room($id, $data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil edit Ruangan');
        } else {
            return redirect()->back()->with('error', 'Gagal edit Ruangan');
        }
    }
}
