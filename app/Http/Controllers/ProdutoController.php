<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function show($id = null){
        return "Show: ". $id;
    }
}
