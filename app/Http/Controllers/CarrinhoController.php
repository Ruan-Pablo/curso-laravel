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
    public function removerItemCarrinho(Request $req){
        \Cart::remove($req->id);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido com sucesso!');
    }

    public function atualizarItemCarrinho(Request $req){
        \Cart::update($req->id, [
            'quantity' => [
                'relative' => false,
                'value' => $req->quantity
            ],
        ]);
        return redirect()->route('site.carrinho')->with('sucesso', 'Produto atualizado com sucesso!');
    }
}
