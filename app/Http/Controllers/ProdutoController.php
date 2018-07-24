<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Http\Resources\ProdutoResource;



class ProdutoController extends Controller
{
    public function showResource($id){
        return new ProdutoResource(Produto::find($id));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();

        return $produtos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produto = new Produto;

        $produto->nome = $request->nome;
        $produto->tipo = $request->tipo;
        $produto->preco = $request->preco;
        $produto->quantidade = $request->quantidade;

        $produto->save();
        return ('Produto criado com sucesso! Detalhes: '.$produto.'.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        return ('Produto: '.$produto.'.');
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
        $produto = Produto::find($id);

        $produto->nome = $request->nome;
        $produto->tipo = $request->tipo;
        $produto->preco = $request->preco;
        $produto->quantidade = $request->quantidade;

        $produto->save();
        return ('Produto atualizado com sucesso! Detalhes: '.$produto.'.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return ('Produto deletado com sucesso!');

    }
}
