@extends('site.layout')
@section('titulo', 'Home')
@section('conteudo')

<div class="row container">

    @if ($mensagem = Session::get('sucesso'))
            <div class="card green darken-1">
                <div class="card-content white-text">
                <span class="card-title">Parabéns</span>
                <p>{{$mensagem}}</p>
                </div>
            </div>
    @endif

    <h5> Seu carrinho possui {{ $itens_carrinho->count()}} produto(s). </h5>

    <table>
        <thead>
          <tr>
              <th></th>
              <th>Nome</th>
              <th>Preço</th>
              <th>Quantidade</th>
              <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($itens_carrinho as $item)
            <tr>
                <td><img src="{{ $item->attributes->image }}" alt="{{ $item->name }}" class="responsive-img circle" width="50"></td>
                <td>{{$item->name}}</td>
                <td>R$ {{number_format($item->price, 2, ',', '.')}}</td>
                <td><input type="number" name="quantity" value="{{$item->quantity}}" min="1" class="white center" style="width: 40px; font-weight:900;"></td>
                <td>
                    <button class="btn-floating btn-small waves-effect waves-light orange">
                        <i class="material-icons">refresh</i>
                    </button>
                    <button class="btn-floating btn-small waves-effect waves-light red">
                        <i class="material-icons">delete</i>
                    </button>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    <div class="row">
      <div class="row container center">
        <button class="btn waves-effect waves-light blue"> Continuar comprando <i class="material-icons right">arrow_back</i></button>
        <button class="btn waves-effect waves-light blue"> Limpar carrinho <i class="material-icons right">clear</i></button>
        <button class="btn waves-effect waves-light green"> Finalizar pedido <i class="material-icons right">check</i></button>
      </div>
    </div>

</div>

@endsection

