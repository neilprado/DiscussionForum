<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Relative;
use Auth;

class RelativesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relatives = Relative::all();

        $genogram = $this->generateGenogramJson(auth()->user());


        return view('relatives.index')->with('relatives', $relatives)->with('genogram', $genogram);
    }

    public function showTree($user = null)
    {
        if ($user == null) {
            $user = auth()->user();
        }
        else {
            $user = User::find($user);
        }
        

        $genogram = $this->generateGenogramJson($user);

        return view('relatives.tree')->with('genogram', $genogram);
    }

    private function generateGenogramJson($user)
    {
        $relatives = $user->relatives;

        $relativesArray = [];

        foreach ($relatives as $relative) {
            $r = [];
            $r['key'] = $relative->id;
            $r['n'] = $relative->name."\n".$relative->birth_year."-".$relative->death_year;
            $r['s'] = 'M';
            $r['pic'] = url('img/relatives/nopic.jpg');

            if($relative->mother_relative_id) {
                $r['m'] = $relative->mother_relative_id;
            }
            
            if($relative->father_relative_id) {
                $r['f'] = $relative->father_relative_id;
            }

            if($relative->wife_relative_id) {
                $r['ux'] = $relative->wife_relative_id;
            }

            if($relative->husband_relative_id) {
                $r['vir'] = $relative->husband_relative_id;
            }

            $relativesArray[] = $r;
        }

        return json_encode($relativesArray, JSON_UNESCAPED_SLASHES);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relatives = Relative::all()->pluck('name', 'id');

        return view('relatives.create')->with('relatives', $relatives);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function validate_relations($request){

        $birth = intval($request->input('birth_year'));
        $death = intval($request->input('death_year'));
        $mother = Relative::find($request->input('mother_relative_id'));
        $father = Relative::find($request->input('father_relative_id'));
        $husband = Relative::find($request->input('husband_relative_id'));
        $wife = Relative::find($request->input('wife_relative_id'));

        if ($death && $death < $birth) {
            return back()->with('error', 'Morte não pode ser antes do nascimento');
        }
        
        if ($father != null && $father->death_year && $father->death_year < $birth - 1) {
            return back()->with('error', 'Não pode ser o pai');
        }

        if ($mother != null && $mother->death_year && $mother->death_year < $birth - 1) {
            return back()->with('error', 'Não pode ser a mãe');
        }

        $array_relatives = array();

        if($mother != null) {
            $array_relatives[] = $mother->id;
        }

        if ($father != null) {
            if(in_array($father->id, $array_relatives)){
                return back()->with('error', 'Não é possível ter relacionamentos repetidos');
            }
            else {
                $array_relatives[] = $father->id;
            }   
        }

        if ($husband != null){
            if(in_array($husband->id, $array_relatives)){
                return back()->with('error', 'Não é possível ter relacionamentos repetidos');
            }
            else{
                $array_relatives[] = $husband->id;
            }   
        }

        if ($wife != null){
            if(in_array($wife->id, $array_relatives)){
                return back()->with('error', 'Não é possível ter relacionamentos repetidos');
            }
            else{
                $array_relatives[] = $wife->id;
            }   
        }
        return true;
    }

    public function store(Request $request)
    {
        $result = $this->validate_relations($request);

        if($result !== true) return $result;
        
        $birth = intval($request->input('birth_year'));
        $death = intval($request->input('death_year'));

        $relative = new Relative;
        $relative->name = $request->input('name');
        $relative->user_id = Auth::user()->id;
        $relative->birth_year = $birth;
        $relative->death_year = ($death > 0) ? $death : null;

        $relative->mother_relative_id = $request->input('mother_relative_id');
        $relative->father_relative_id = $request->input('father_relative_id');
        $relative->husband_relative_id = $request->input('husband_relative_id');
        $relative->wife_relative_id = $request->input('wife_relative_id');

        $relative->save();
        return redirect('relatives')->with('success', 'Parente criado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relative = Relative::findOrFail($id);
        $relatives = Relative::where('id', '<>', $id)->get()->pluck('name', 'id');

        return view('relatives.edit')->with('relative', $relative)->with('relatives', $relatives);
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
        $result = $this->validate_relations($request);

        if($result !== true) return $result;
        
        $relative = Relative::find($id);
        $relative->name = $request->input('name');
        $relative->birth_year = $request->input('birth_year');
        $relative->death_year = $request->input('death_year');
        $relative->mother_relative_id = $request->input('mother_relative_id');
        $relative->father_relative_id = $request->input('father_relative_id');
        $relative->husband_relative_id = $request->input('husband_relative_id');
        $relative->wife_relative_id = $request->input('wife_relative_id');
        $relative->save();
        return redirect('relatives')->with('success', 'Parente atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Relative::destroy($id);
        return redirect('relatives')->with('success', 'Parente apagado com sucesso');
    }
}
