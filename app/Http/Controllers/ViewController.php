<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ViewController extends Controller
{

    public function profile()
    {
        return view('userProfile');
    }

    public function reservationslist()
    {
        return view('userList');
    }
}
