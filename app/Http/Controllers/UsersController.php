<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show()
    {
        return view('users.show');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|unique:users|max:20',
            'password' => 'required|confirmed|min:6'
        ]);
    }
}
