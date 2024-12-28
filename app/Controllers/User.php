<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Home',
        ];

        return view('user/home', $data);
    }
}
