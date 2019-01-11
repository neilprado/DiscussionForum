<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Bem vindo ao TechForum';
        return view('pages.index')->with('title', $title);
    }
}
