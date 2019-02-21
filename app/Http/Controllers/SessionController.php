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
                'message' => 'Email ou senha incorretos, por favor tente novamente'
            ]);
        }
        setcookie('olduser', $req->input('email'), time() + 7200);
        return redirect()->to('');
    }
    
    public function destroy()
    {
        auth()->logout();
        
        return redirect()->to('');
    }
}
