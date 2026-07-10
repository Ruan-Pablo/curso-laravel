@extends('site.layout')
@section('titulo', 'Home')
@section('conteudo')
    {{-- comentário --}}
    {{-- OPERADOR TERNÁRIO --}}
    {{ isset($nome) ? 'existe' : 'não existe'}}
    {{ $padrao ?? 'padrao'}}

    {{-- Estrutura de controle --}}
    {{-- IF, UNLESS: se é false, ELSE --}}
    {{ $if = 'if'}}
    @if($if == 'if')
        Estrutura de controle IF
    @endif

    @unless($if != 'if')
        Estrutura de controle UNLESS
    @endunless

    {{-- SWITCH CASE --}}
    @switch($idade)
        @case(28)
            idade ok
            @break
        @case(29)
            idade errada
            @break
        @default
            default
    @endswitch

    {{-- ISSET: se existe --}}
    @isset($existe)
        Existe: {{ $existe }}
    @endisset

    {{-- EMPTY: se está vazio --}}
    @empty($vazio)
        Está vazio
    @endempty

    {{-- AUTH: se o usuário está autenticado --}}
    @auth
        <p>Olá, {{ auth()->user()->name }}!</p>
    @endauth

    {{-- GUEST: se o usuário não está autenticado --}}
    @guest
        <p>Olá, visitante!</p>
    @endguest


    {{-- ESTRUTURAS DE REPETIÇÃO --}}
    @for($i = 0; $i < 5; $i++)
        <p>For: {{ $i }}</p>
    @endfor

    @php $i = 0; @endphp
    @while($i < 10)
        <p>While: {{ $i }}</p>
        @php $i++; @endphp
    @endwhile

    @foreach($frutas as $fruta)
        <p>Foreach: {{ $fruta }}</p>
    @endforeach

    @forelse($frutas as $fruta)
        <p>Forelse: {{ $fruta }}</p>
    @empty
        <p>Não existem frutas</p> {{-- mostra um valor padrão --}}
    @endforelse


    <h1>Bem-vindo ao nosso site</h1>
    <p>Este é o conteúdo da página inicial.</p>
