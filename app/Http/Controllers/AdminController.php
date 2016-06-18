<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index(){
       return view('home');
    }

    public function users(){
        return view('users');
    }

    public function courts(){
        return view('courts');
    }

    public function profile(){
        return view('profile');
    }

    public function reservations(){
        return view('reservations');
    }
}
