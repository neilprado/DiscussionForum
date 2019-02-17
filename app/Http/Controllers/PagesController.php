<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Post;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Bem vindo ao TechForum';
        $themes = Theme::orderBy('id', 'desc')->take(5)->get();
        $posts = Post::orderBy('id', 'desc')->take(5)->get();
        return view('pages.index')->with(['title' => $title, 'themes' => $themes, 'posts' => $posts]);
    }
}
