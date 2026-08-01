<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens_carrinho =  \Cart::getContent();
        dd($itens_carrinho);
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

    }
}
