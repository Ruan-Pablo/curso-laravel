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
        <form action="{{route('site.addcarrinho')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$produto->id}}">
            <input type="hidden" name="name" value="{{$produto->nome}}">
            <input type="hidden" name="price" value="{{$produto->preco}}">
            <input type="number" name="qnt" value="1">
            <input type="hidden" name="image" value="{{$produto->imagem}}">
            <button class="btn orange btn_large">Adicionar ao Carrinho</button>
        </form>
    </div>
</div>

@endsection
