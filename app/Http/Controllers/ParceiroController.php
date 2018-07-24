<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parceiro;
use App\Http\Resources\ParceiroResource;

class ParceiroController extends Controller
{
    public function showResource($id){
        return new ParceiroResource(Parceiro::find($id));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parceiros = Parceiro::all();

        return $parceiros;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parceiro = new Parceiro;

        $parceiro->nome = $request->nome;
        $parceiro->telefone = $request->telefone;
        $parceiro->email = $request->email;

        $parceiro->save();
        return ('Parceiro criado com sucesso! Detalhes: '.$parceiro.'.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parceiro = Parceiro::find($id);
        return ('Parceiro: '.$parceiro.'.');
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
        $parceiro = Parceiro::find($id);

        $parceiro->nome = $request->nome;
        $parceiro->telefone = $request->telefone;
        $parceiro->email = $request->email;

        $parceiro->save();
        return ('Produto atualizado com sucesso! Detalhes: '.$parceiro.'.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parceiro = Parceiro::find($id);
        $parceiro->delete();
        return ('Parceiro deletado com sucesso!');
    }
}
