<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    
    public function store(Request $req)
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        setcookie('olduser', $req->input('email'), time() + 36000);
        return redirect('/');
    }
    
    public function destroy()
    {
        auth()->logout();
        
        return redirect('/');
    }
}