<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servico;
use App\Http\Resources\ServicoResource;

class ServicoController extends Controller
{
    public function showResource($id){
        return new ServicoResource(Servico::find($id));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicos = Servico::all();

        return $servicos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servico = new Servico;

        $servico->nome = $request->nome;
        $servico->preco = $request->preco;
        $servico->funcionario = $request->funcionario;

        $servico->save();
        return ('Serviço criado com sucesso! Detalhes: '.$servico.'.');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servico = Servico::find($id);
        return ('Serviço: '.$servico.'.');
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
        $servico = Servico::find($id);

        $servico->nome = $request->nome;
        $servico->preco = $request->preco;
        $servico->funcionario = $request->funcionario;

        $servico->save();
        return ('Serviço atualizado com sucesso! Detalhes: '.$servico.'.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servico = Servico::find($id);
        $servico->delete();
        return ('Serviço deletado com sucesso!');
    }
}
