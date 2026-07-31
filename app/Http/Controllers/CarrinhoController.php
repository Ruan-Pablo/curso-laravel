<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens_carrinho =  \Cart::getContent();
        dd($itens_carrinho);
    }
}
