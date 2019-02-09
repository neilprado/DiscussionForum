<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Theme;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $themes = Theme::all()->sortBy('name')->pluck('name', 'id');
        return view('posts.create')->with('themes', $themes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'message' => 'required',
            'image' => 'image|nullable|max:1999'
        ]);
        if($request->hasFile('image'))
        {
            $filename = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/img', $filename);
        }else
        {
            $filename = 'noImage.png';
        }
        $post = new Post();
        $post->title = $request->input('title');
        $post->message = $request->input('message');
        $post->user_id = auth()->user()->id;
        $post->theme_id = $request->input('theme_id');
        $post->image = $filename;
        $post->save();
        return redirect('/posts')->with('success', 'Post criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id)
            return redirect('posts')->with('error', 'Acesso não autorizado');
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'message' => 'required'
        ]);
        if($request->hasFile('image'))
        {
            $filename = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/img', $filename);
        }
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->message = $request->input('message');
        if($request->hasFile('image'))
            $post->image = $filename;
        $post->save();
        return redirect('/posts')->with('success', 'Post atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id)
            return redirect('posts')->with('error', 'Acesso não autorizado');
       # if(auth()->user()->id != 'noImage.png')
      #      Storage::delete('/forum/DiscussionForum/public/img/'.$post->image);
        $post->delete();
        return redirect('/posts')->with('success', 'Post removido com sucesso');
    }
}
