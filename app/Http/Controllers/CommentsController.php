<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->get();
        return view('posts.show');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'response' => 'required'
        ]);

        $comment = new Comment();
        $comment->response = $request->input('response');
        $comment->user_id = auth()->user()->id;
        $comment->theme_id = 1; #aqui eu ainda não faço ideia do q fazer
        $comment->save();
    }
}
