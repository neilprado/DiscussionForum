<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\User;

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::orderBy('created_at', 'desc')->get();
        return view('themes.index')->with('themes', $themes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('themes.create');
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
            'name' => 'required'
        ]);
        

        $theme = new Theme();
        $theme->name = $request->input('name');
        $theme->user_id = auth()->user()->id;
        $theme->save();
        
        return redirect('/temas')->with('success', 'Tema criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $theme = Theme::find($id);
        return view('themes.show')->with('theme', $theme);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theme = Theme::find($id);
        if(auth()->user()->id !== $theme->user_id)
            return redirect('theme')->with('error', 'Acesso não autorizado');
        return view('themes.edit')->with('theme', $theme);
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
            'name' => 'required'
        ]);

        $theme = Theme::find($id);
        $theme->name = $request->input('name');
        $theme->save();

        return redirect('/temas')->with('success', 'Post atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theme = Theme::find($id);
        if(auth()->user()->id !== $theme->user_id)
            return redirect('/temas')->with('error', 'Acesso não autorizado');
        $theme->delete();
        return redirect('/temas')->with('success', 'Tema removido com sucesso');
    }
}
