@extends('site.layout')
@section('titulo', 'Datails')
@section('conteudo')

<div class="row container">
    <div class="col s12 m6">
        <img src="{{$produto->imagem}}" alt="" class="responsive-img">
    </div>
    <div class="col s12 m6">
        <h1>{{$produto->nome}}</h1>
        <p>{{$produto->descricao}}</p>
        <button class="btn orange btn_large">Comprar</button>
    </div>
</div>

@endsection
