<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'phone' => 'required|max:20',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials))
        {
            session()->flash('success', '欢迎回来！');
            return redirect()->route('home');
        }
        else
        {
            session()->flash('danger', '很抱歉，您的手机号和密码不匹配');
            return redirect()->back()->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}
