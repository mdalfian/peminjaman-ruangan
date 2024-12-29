<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\RoomModel;

class User extends BaseController
{
    protected $roomModel;
    protected $bookModel;
    protected $db;

    public function __construct()
    {
        $this->roomModel = new RoomModel;
        $this->bookModel = new BookingModel;
    }

    public function index(): string
    {
        $data = [
            'title' => 'Home',
        ];

        return view('user/home', $data);
    }

    public function room()
    {
        $data = [
            'title' => 'Ruangan',
            'rooms' => $this->roomModel->get_room()->getResult()
        ];

        return view('user/room', $data);
    }

    public function booking()
    {
        $data = [
            'title' => 'Peminjaman',
            'bookings' => $this->bookModel->get_user_booking(session('id'))->getResult()
        ];

        return view('user/booking', $data);
    }
}
