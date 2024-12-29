<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class BookingModel extends Model
{
    protected $db;

    function __construct()
    {
        $this->db = Database::connect();
    }

    function add_booking($data)
    {
        return $this->db->table('bookings')->insert($data);
    }

    function get_booking($status)
    {
        return $this->db->table('bookings tb1')
            ->select('*')
            ->join('users tb2', 'tb1.user_id = tb2.user_id')
            ->join('rooms tb3', 'tb1.room_id = tb3.room_id')
            ->where(['status' => $status])
            ->orderBy('booking_time ASC')
            ->get();
    }

    function get_report($start_date = null, $end_date = null)
    {
        if ($start_date != null && $end_date != null) {
            return $this->db->table('bookings tb1')
                ->select('*')
                ->join('users tb2', 'tb1.user_id = tb2.user_id')
                ->join('rooms tb3', 'tb1.room_id = tb3.room_id')
                ->where(['start_time >=' => $start_date . ' 00:00'])
                ->where(['start_time <=' => $end_date . ' 23:59'])
                ->orderBy('booking_time ASC')
                ->get();
        } else {
            return $this->db->table('bookings tb1')
                ->select('*')
                ->join('users tb2', 'tb1.user_id = tb2.user_id')
                ->join('rooms tb3', 'tb1.room_id = tb3.room_id')
                ->orderBy('booking_time ASC')
                ->get();
        }
    }

    function get_user_booking($id)
    {
        return $this->db->table('bookings tb1')
            ->select('*')
            ->join('users tb2', 'tb1.user_id = tb2.user_id')
            ->join('rooms tb3', 'tb1.room_id = tb3.room_id')
            ->where(['tb1.user_id' => $id])
            ->orderBy('booking_time ASC')
            ->get();
    }

    function get_booking_by_id($id)
    {
        return $this->db->table('bookings')->getWhere(['book_id' => $id]);
    }

    function review_booking($data, $id)
    {
        return $this->db->table('bookings')->update($data, ['book_id' => $id]);
    }

    function reject_same_book_time($start, $end)
    {
        return $this->db->table('bookings')
            ->where('start_time >=', '' . $start . '')
            ->where('start_time <', '' . $end . '')
            ->where('status', 'Pending')
            ->set(array('status' => 'Rejected'))
            ->update();
    }

    function check_same_booking_time($start, $room)
    {
        return $this->db->table('bookings tb1')
            ->select('tb1.*,tb2.username,tb3.room_name')
            ->join('users tb2', 'tb1.user_id = tb2.user_id')
            ->join('rooms tb3', 'tb1.room_id = tb3.room_id')
            ->where(array('start_time <=' => '' . $start . '', 'end_time >=' => '' . $start . '', 'tb1.room_id' => $room, 'status' => 'Approved'))
            ->get();
    }
}
