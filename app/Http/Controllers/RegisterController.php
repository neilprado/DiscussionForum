<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        auth()->login($user);
        setcookie('olduser', $user->email, time() + 7200);
        
        return redirect()->to('');
    }
}
