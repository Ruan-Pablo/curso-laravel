<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(3);

        return view('site.produto', compact('produtos'));
    }
    public function details($slug){
        // busca um registro onde o campo 'slug' seja igual ao $slug informado
        // first() : o primeiro que achar
        $produto = Produto::where('slug', $slug)->first();

        return view('site.details', compact('produto'));
    }
    public function categoria($id){
        $categoria = Categoria::find($id); // Busca pelo id automaticamente
        $produtos = Produto::where('id_categoria', $id)->paginate(3);
        return view('site.categoria', compact('produtos', 'categoria'));
    }
}
