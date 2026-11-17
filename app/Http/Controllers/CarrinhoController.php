<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens_carrinho =  \Cart::getContent();
        return view('site.carrinho', compact('itens_carrinho'));
    }
    public function adicionaCarrinho(Request $req){
        \Cart::add([
            'id' => $req->id,
            'name' => $req->name,
            'price'=> $req->price,
            'quantity'=> $req->qnt,
            'attributes'=> array(
                'image' => $req->image
            )
        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado com sucessso!');
    }
    public function remover_carrinho($id){
        \Cart::remove($id);
        return redirect()->route('site.carrinho');
    }
}
