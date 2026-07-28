@extends('site.layout')
@section('titulo', 'Datails')
@section('conteudo')

<div class="row container"><br>
    <div class="col s12 m6">
        <img src="{{$produto->imagem}}" alt="" class="responsive-img">
    </div>
    <div class="col s12 m6">
        <h4>{{$produto->nome}}</h4>
        {{-- number_format(valor, casas, 'separador_decimal', 'separador_milhar') --}}
        <p>R$ {{number_format($produto->preco, 2, ',','.')}}</p>
        <p>{{$produto->descricao}}</p>
        <p>Categoria: {{$produto->categoria->nome}}</p>
        <p>Postado por: {{$produto->user->firstName}}</p>
        <button class="btn orange btn_large">Comprar</button>
    </div>
</div>

@endsection
