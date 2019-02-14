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

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'response' => 'required'
        ]);

        $comment = new Comment();
        $comment->response = $request->input('response');
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $id; #aqui eu ainda não faço ideia do q fazer
        $comment->save();
        return view('posts.show')->with('success', 'Comentário realizado com sucesso');
    }
}
