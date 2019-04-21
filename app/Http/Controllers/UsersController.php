<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.home');
    }

    public function create()
    {
        return view('users.create');
    }
}
