@extends('site.layout')
@section('titulo', 'Home')
@section('conteudo')

<div class="row container">

    @foreach ($produtos as $produto)
    <div class="col s12 m4">
      <div class="card">
        <div class="card-image" >
            <img width="200" height="200" src="{{$produto->imagem}}">
            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
            <span class="card-title">{{$produto->nome}}</span>
            <p>{{Str::limit($produto->descricao, 20)}}</p>
        </div>
      </div>
    </div>
    @endforeach

    <div class="row"></div>
    <div class="row center">
        {{ $produtos->links('custom.pagination') }}

    </div>
</div>

@endsection

