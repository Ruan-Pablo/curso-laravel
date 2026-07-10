<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Título Padrão')</title>

    @stack('styles')

</head>
<body>

@yield('conteudo')

@stack('scripts')



</body>
</html>
