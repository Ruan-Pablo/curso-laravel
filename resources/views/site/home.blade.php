@extends('site.layout')
@section('titulo', 'Home')
@section('conteudo')
    <h1>Bem-vindo ao nosso site</h1>
    <p>Este é o conteúdo da página inicial.</p>

    @include('includes.mensagem', ['titulo' => 'Mensagem de Teste'])

    @component('components.sidebar')
        @slot('titulo')
            Título do Sidebar
        @endslot
    @endcomponent

@endsection

@push('styles')
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
@endpush
@push('scripts')
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endpush
