<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
use Config\Database;
use Config\Services;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class BookingController extends BaseController
{
    protected $bookModel;
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->bookModel = new BookingModel;
        $this->userModel = new UserModel;
        $this->db = Database::connect();
    }

    public function insert_booking()
    {
        $data = [
            'room_id' => $this->request->getPost('room_id'),
            'user_id' => $this->request->getPost('user_id'),
            'start_time' => $this->request->getPost('start_time'),
            'end_time' => $this->request->getPost('end_time'),
            'purpose' => $this->request->getPost('purpose'),
        ];

        $room = $this->request->getPost('room_id');
        $start = $this->request->getPost('start_time');

        $check = $this->bookModel->check_same_booking_time($start, $room)->getNumRows();

        if ($check > 0) {
            $row = $this->bookModel->check_same_booking_time($start, $room)->getRow();
            $row_start = date_create($row->start_time);
            $row_end = date_create($row->end_time);
            return redirect()->back()->with('error', 'Ruangan ' . $row->room_name . ' telah Dipesan oleh ' . $row->username . ' pada jam ' . date_format($row_start, 'H.i') . ' sampai ' . date_format($row_end, 'H.i') . '');
        } else {
            $this->bookModel->add_booking($data);

            if ($this->db->affectedRows() > 0) {
                return redirect()->back()->with('success', 'Berhasil memesan Ruangan, silahkan tunggu pesanan diterima');
            } else {
                return redirect()->back()->with('error', 'Gagal memesan Ruangan');
            }
        }
    }

    public function accept($id)
    {
        $data = [
            'status' => 'Approved'
        ];

        $this->bookModel->review_booking($data, $id);

        if ($this->db->affectedRows() > 0) {
            $booking = $this->bookModel->get_booking_by_id($id)->getRow();

            $this->bookModel->reject_same_book_time($booking->start_time, $booking->end_time);
            return redirect()->back()->with('success', 'Berhasil menyetujui peminjaman');
        } else {
            return redirect()->back()->with('error', 'Gagal menyetujui peminjaman');
        }
    }

    public function reject($id)
    {
        $data = [
            'status' => 'Rejected'
        ];

        $this->bookModel->review_booking($data, $id);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil menolak peminjaman');
        } else {
            return redirect()->back()->with('error', 'Gagal menolak peminjaman');
        }
    }
}
