<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nome = "Lucas";
        $idade = 30;
        $html = "<h1>Perfil</h1>";
        return view('perfil', compact('nome', 'idade', 'html'));
        // return view('perfil', [
        //     'nome' => $nome,
        //     'idade' => $idade
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
