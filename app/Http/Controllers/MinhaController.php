<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produto;

class MinhaController extends Controller
{
    public function criarProduto(Request $request){

    	$novoProduto = new produto;

    	$novoProduto->nome = $request->nome;
    	$novoProduto->tipo = $request->tipo;
    	$novoProduto->preco = $request->preco;
    	$novoProduto->quantidade = $request->quantidade;

    	$novoProduto->save();
    }

    public function getProduto($id){

    	$produto = produto::findorfail($id);

    	return response()->json([$produto]);
    }

    public function atualizarProduto(Request $request, $id){

    	$produto = produto::findorfail($id);

    	if($request->nome){
    		$produto->nome = $request->nome;
    	}

    	if($request->tipo){
    		$produto->tipo = $request->tipo;
    	}

    	if($request->preco){
    		$produto->preco = $request->preco;
    	}

    	if($request->quantidade){
    		$produto->quantidade = $request->quantidade;
    	}

    	$produto->save();
    }

    public function deletarProduto($id){

    	produto::destroy($id);
    	
    }
}