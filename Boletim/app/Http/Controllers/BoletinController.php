<?php

namespace App\Http\Controllers;

use App\Models\boletin;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\StoreUpdateBoletin;


class BoletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $search = $request->input('search');
        $boletins = DB::table('boletins')->where('nome', 'like', '%'.$search.'%')->paginate();
        return view('dashboard', ['boletins' => $boletins]); 

        if(!empty($search)) {
            $boletins = School::where('nome', 'LIKE', '%'.$search.'%');
        }

        

    }

    public function index()
    {
        $boletins = boletin::all();
        return view('dashboard', ['boletins' => $boletins]); 
    }

    public function create()
    {
        return view('create');
    }


    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreUpdateBoletin $request)
    {
       boletin::create([
        'nome' => $request->nome,
        'nota_1_unidade' => $request->nota_1_unidade,
        'nota_2_unidade' => $request->nota_2_unidade,
        'nota_3_unidade' => $request->nota_3_unidade,
        'sala' => $request->sala,
        'turno' => $request->turno
       ]);

       return redirect()->action([BoletinController::class, 'index'])->with('status', 'Aluno Cadastrado Com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\boletin  $boletin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($boletins = boletin::where('id', $id)->first()){
            return view('Pagdestroy', compact('boletins'));
        }
        else
        {
            return redirect()->route('dashboard');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\boletin  $boletin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($boletins = boletin::where('id', $id)->first())
        {
            return view('edit', compact('boletins'));
        }
        else
        {
            return redirect()->route('dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\boletin  $boletin
     * @return \Illuminate\Http\Response
     */
    public function update($id, StoreUpdateBoletin $request)
    {
        $boletins = boletin::where('id', $id)->first();
        $boletins->update($request->all());
        
        return redirect()->action([BoletinController::class, 'index'])->with('status', 'Alteração Feita Com Sucesso!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\boletin  $boletin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $boletins = boletin::findOrFail($id);
        $boletins->delete();

        return redirect()->action([BoletinController::class, 'index'])->with('status', 'Aluno Excluido Com Sucesso!');
    }
}