<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    public function show()
    {
        dump(Auth::user() instanceof User ? Auth::user()->toArray() : null);
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

        $user = User::create([
            'string_id'     => substr(md5($request->phone . 'long-wo' . Carbon::now()->timestamp), 0, 16),
            'name'          => substr($request->phone, 0, 3) .'****'. substr($request->phone, 7, 4),
            'phone'         => $request->phone,
            'password'      => bcrypt($request->password),
            'avatar'        => url('/default/avatar.jpg'),
        ]);
        session()->flash('success', '注册成功，欢迎！');
        return redirect()->route('home');
    }
}
