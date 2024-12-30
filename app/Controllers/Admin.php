<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\RoomModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel;
    protected $roomModel;
    protected $bookModel;
    protected $db;

    public function __construct()
    {
        $this->userModel = new UserModel;
        $this->roomModel = new RoomModel;
        $this->bookModel = new BookingModel;
    }

    public function index(): string
    {
        $data = [
            'title' => 'Home',
            'bookings' => $this->bookModel->get_booking_today()->getResult()
        ];

        return view('admin/home', $data);
    }

    public function booking_today()
    {
        $data = [
            'bookings' => $this->bookModel->get_booking_today()->getResult()
        ];

        return view('admin/book_today', $data);
    }

    public function notification()
    {
        $notifikasi = [
            'pending' => $this->bookModel->get_booking('Pending')->getNumRows(),
            'booked' => $this->bookModel->get_room_booked()->getNumRows(),
            'available' => $this->roomModel->get_room()->getNumRows()
        ];

        echo json_encode($notifikasi);
    }

    public function user()
    {
        $data = [
            'title' => 'User',
            'users' => $this->userModel->get_user()->getResult()
        ];

        return view('admin/user', $data);
    }

    public function room()
    {
        $data = [
            'title' => 'Ruangan',
            'rooms' => $this->roomModel->get_room()->getResult()
        ];

        return view('admin/room', $data);
    }

    public function booking_pending()
    {
        $data = [
            'title' => 'Peminjaman',
            'bookings' => $this->bookModel->get_booking('Pending')->getResult()
        ];

        return view('admin/booking', $data);
    }

    public function booking_approved()
    {
        $data = [
            'title' => 'Peminjaman Diterima',
            'bookings' => $this->bookModel->get_booking('Approved')->getResult()
        ];

        return view('admin/booking', $data);
    }

    public function booking_rejected()
    {
        $data = [
            'title' => 'Peminjaman Ditolak',
            'bookings' => $this->bookModel->get_booking('Rejected')->getResult()
        ];

        return view('admin/booking', $data);
    }

    public function booking_report()
    {
        $start_date = null;
        $end_date = null;

        if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
            $start_date = $this->request->getPost('start_date');
            $end_date = $this->request->getPost('end_date');
        }

        $data = [
            'title' => 'Laporan Peminjaman',
            'start_date' => $start_date,
            'end_date' => $end_date,
            'bookings' => $this->bookModel->get_report($start_date, $end_date)->getResult()
        ];

        return view('admin/booking', $data);
    }
}
