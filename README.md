# Estudo de PHP com Laravel <img align="center" alt="Python" height="30" width="40" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/laravel/laravel-original.svg">

###### Este repositorio tem como objetivo documentar o que será estudado sobre Laravel

## Ambiente
### Laragon
- cria o ambiente de desenvolvimento
- controle do servirço e banco de dados
- **Apache**: servidor web
- **HeidiSQL** ou **PhpMyADMIN**: gerenciamento do banco de dados MySQL
- **Terminal**: para comandos linux no diretório www de onde o laragon está instalado
> [!IMPORTANT]
> Verificar versão do PHP

#### Pra atualizar a versão do PHP
- Vai no [site de download do php](https://www.php.net/downloads.php)
- Baixa a versão que deseja
- extrai 
- Move o arquivo extraído para dentro da pasta PHP dentro da pasta bin dentro da pasta do Laragon. **Caminho**: `C:laragon/bin/php`

#### **Composer**
Composer é um gerenciador de pacotes (estilo o npm pro node). Gerencia as dependencias. Está integrado ao **Laragon**. Faz instalação
- utiliza o repositorio packagist, é onde ficam as dependencias para poder instalar


### Virtual Host
Laragon trabalha com uma estrutura de **virtual Hosts**. Pra cada pasta ele cria um virtual Host que vai entregar uma estrutura de URL mais interessante.

O host possui url diferente no padrão: `{name}.test` de possível alteração através das preferencias no Laragon

## Instalação
Para criar com a versão `latest`, executa o comando dentro do terminal do **laragon**
```
composer create-project laravel/laravel nome-app
```
- assim ele cria uma pasta dentre da www no laragon

**Vscode**

## Estrutura de pastas
- .env - informações sensíveis
- artisan - rodar comandos para simplificar tarefas (igual scritps)
- composer.json - igual package-json, cuida das dependencias
- package.json - para as dependencias de pacotes do js
- pasta public -  documento root, ponto de partida
- bootstrap - arquivos de inicialização
- config - arquivos de configuração do framework
- vendor - armazena tudo que for gerenciaod pelo composer (semelhante ao node_modules)
- routes - arquivos de rota normal, para criar abserveces
- database - definição do banco dedados
- resources - onde fica as views
- storage - conteúdos de log, processaods durante a aplicação
- app - onde fica a parte lógica de desenvolvimento

## Artisan
Arquivo para utilizar linhas de comandos. Útil para desenvolver scripts

Possui seus próprios comandos

- `php artisan list`: lista possíveis comandos
- `php artisan serve`: executa um servidor próprio do Laravel
- `php artisan down`: deixa em modo de manutenção 
- `php artisan up`: sobe dnv 
- `php artisan help`: mostra comandos
- `php artisan help migrate`: mostra detalhes do comando


## MVC

O Laravel utiliza a arquitetura MVC por padrão. Model-View-Controller
- Model manipula o Banco de dados.
- Controller recebe requisição, coordena toda a lógica e se comunica com Model e View.. 
- View responde com html.

## Introdução a Rotas

Métodos HTTP: GET, POST, PUT, PATCH, DELETE

### any e match

- Any: aceita qualquer método HTTP
```laravel
Route::any('/any', function(){
    return "Permite todo tipo de acesso http";
});
```

- Match: so aceita métodos definidos
```laravel
Route::match([GET, POST],'/match', function(){
    return "Permite acesso apenas a método http especificado no [ ]";
});
```

### Passagem de parametro

```laravel
Route::get('/produto/{id}/{categoria?}', function($id, $categoria = "indefinida"){
    return "Produto: ".$id."<br>"."A categoria é: ".$categoria;
});
```
- aqui tem exemplo tbm de parametro opcional **"?"** e valor **default**

### Redirect e view


### Nomeado Rotas

`->(name);`

```
Route::get('news', function(){
    return "Rota NOMEADA";
})->name('noticias'); // nomeando a rota
// utilzando o nome como referencia para acessar a rota
Route::get('novidades', function(){
    return redirect()->route('noticias');
});
```
- Interessante dessa situação é que mesmo que altere a rota '/news', sempre que acessar a rota '/novidades' irá redirecionar para a rota que NOMEADA

### Grupo de Rotas

- Agrupamento por rotas
```
Route::prefix('admin')->group(function(){
    Route::get('/', function(){
        return "Página principal do admin";
    });
    Route::get('profile', function(){
        return "Perfil do admin";
    });
    Route::get('settings', function(){
        return "Configurações do admin";
    });
});
```

- Agrupamento por nomes
```
Route::name('admin.')->group(function(){
    Route::get('/admin', function(){
        return "Página principal do admin";
    })->name('main');
    Route::get('admin/profile', function(){
        return "Perfil do admin";
    });->name('profile');
    Route::get('admin/settings', function(){
        return "Configurações do admin";
    });->name('settings');
});
```

## Controller
Camada responsável pela lógica e controlle da aplicação

Para criar um controller é necessário:
- Abrir o terminal
- `php artisan make:controller NOMEController`

O nome do controller tem uma conversão de sem **sempre no singular** e ter o sufixo **Controller**.
Esse controller criado, extende o Controller base e ja utiliza o Illuminate. E ja é criado o **namespace** MUITO importante para referenciar o controller.

> [!NOTE]
> **Illuminate**: estrutura principal do Laravel que agrupa todos os componentes e bibliotecas que fazer o framework funcionar.

### Passando Parâmetro para o Controller

igual na rota e recebe no controller na função em que está sendo chamada

```Laravel
// Rota
use App\Http\Controllers\ProdutoController;
Route::get('/param/{id?}', [ProdutoController::class, 'show'])->name('produto.show');

// Controller
class ProdutoController extends Controller
{
    public function show($id = null){
        return "Show: ". $id;
    }
}
```
### Criando Controller com Resource

- `php artisan make:controller ProdutoResourceController --resource`

Já cria o Controller com alguns métodos genéricos
- index: Lista todos os registros5
- create: Exibir formulário de criação
- store: Salvar novo registro no banco
- show: Exibe UM registro específico
- edit: Exibir formulário de edição
- update: Atualizar registro no banco
- destroy: Deletar registro no banco

Além disso, utilizando ``Route::resource()` ele já crias as rotas:
```Route::resource('produtos', ProdutoResourceController::class); ```

`php artisan route:list`
| Método | URI | Nome da Rota | Controller |
|--------|-----|--------------|------------|
| GET\|HEAD | produtos | produtos.index | ProdutoResourceController@index |
| POST | produtos | produtos.store | ProdutoResourceController@store |
| GET\|HEAD | produtos/create | produtos.create | ProdutoResourceController@create |
| GET\|HEAD | produtos/{produto} | produtos.show | ProdutoResourceController@show |
| PUT\|PATCH | produtos/{produto} | produtos.update | ProdutoResourceController@update |
| DELETE | produtos/{produto} | produtos.destroy | ProdutoResourceController@destroy |
| GET\|HEAD | produtos/{produto}/edit | produtos.edit | ProdutoResourceController@edit |


## Configurando Banco de dados

.env possui configuração setada:
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

além disso, em [config/database](config/database.php) possui configurações predefinidas para `DB_CONNECTION` como: `sqlite`, `mysql`, `postgresql`

pra criar uma nova tabela:
- inicia o mysql 3306
- abri o HeidiSQL
- Inicia o banco Laragon.MySQL
- daí cria o banco com a mesma coleção que está setada no database.php
- `'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),`
- dps, se necessário, muda o nome do banco no arquivo `.env` em `DB_NAME`

## Migrations

para trabalhar com as tabelas do banco de dados: criar, alterar e excluir. 
eles possuem dois métodos, up e donw. Quando a migration é executada, o up é assionado, e quando é feito o reverso na migration, o down é assionado. up usa o método create, pra criar a tabela

**UP:**
- usa método create para criar tabelas
**DOWN**:
- exclui tudo menos a tabela *migrate* que armazena infromações sobre as migrates

Comandos terminais de migrates:
- `php artisan migrate`: EXECUTA OS MIGRATIONS, os up
- `php artisan migrate:rollback`: APAGA AS MIGRATIONS, com down, MANTÉM A TABELA MIGRATION
- `php artisan migrate:status`: STATUS DE CADA MIGRATION

> são feitos para funcionar de forma SEQUENCIAL, então um pode depender do outro

### Criando

- `php atisan make:migration create_nome_table`
prefixo `create` e sufixo `table` já tráz algumas predefinições

- `php artisan make:migration nome_tabela --create=nome_tabela`
perminte colocar o nome do arquivo sem prefixo e sufixo, além de fazer a mesma coisa

### Trabalhando com Migration

Executar as migrations: `php artisan migrate`

Para editar o nome de uma tabela: `Schema::rename('nome_tabela','novo_nome')` 

Para **excluir**: `Schema::dropIfExists('tabela_exclui')`

### Reset Refresh e Fresh

`php artisan migrate:rollback`: reverte a ULTIMA migração
`php artisan migrate:reset`: rolling back em TODAS as migrations, "apaga" as tabelas das migrations
`php artisan migrate:refresh`: faz o reset e re-executa as migrations
`php artisan migrate:fresh`: ele faz DROP nas tabelas e re-executa

### Modificando Colunas
Pra fazer modificações nas colunas das migrations por uma migrate é necessário instalar uma biblioteca:
- `composer require doctrine/dbal`
assim é possível fazer alterações no nome, tamanho e etc, na coluna.
```laravel
Schema::table('modificar_nomee', function(Blueprint $tabel){
    $table->rename('nomee', 'nome');
    $table->drop('nomecompleto');
})
```

## Entendendo os Models

Criando um model: `php artisan make:model Produto` 
O Laravel assume automaticamente que:

> Model Produto → tabela produtos (plural do nome do model em minúsculo)

### Criando tabelas Users, Categorias e Produtos

## Seeders

Automatiza o processo de dados para testes no desenvolvimento.

`php artisan make:seeder UserSeeder`

No *Seeder* existe apenas 1 método: `run()` para executar uma tarefa em determinada tabela, seja inserção em massa ou deleção..

#### DatabaseSeeder

O *DatabaseSeeder* faz a execução de todos os Seeders presentes com `php artisan db:seed`.

```laravel
$this->call([
    UserSeeder::class,
]);

```
## Factory
Para inserir registros em massa de forma automática apenas para testes. Nele é definido os valores que serão randomizados.

Para criar o Factory: ´php artisan make:factory nomeFactory´

Após a definição ele é carregado "x" vezes no Seeder, que por sua vez é chamado no DatabaseSeeder

> Na criação do nome desses componentes é utilizado por convenção
> - singular em *Factory*
> - plural em *Seeders*

- No seeder é comum que seja assim:
```laravel

```

## mfscr

modos de criação:
- `php artisan make:model Exemplo -migration - factory -seeder -controller --resorce`
- `php artisan make:model Exemplo mfscr`

### Factory Produtos e StrSlug
-`'preco' => $this->faker->randomNumber(2)`
    - Gera um número aleatório com até 2 dígitos (0 a 99)
    - Melhor usar: $this->faker->randomFloat(2, 10, 1000) - dois decimais entre 10 e 1000
- `'slug' => \Str::slug($nome)`
    - Converte o nome em uma URL amigável
    - Exemplo: "Camisa Azul" → "camisa-azul"
- `'imagem' => $this->faker->imageUrl(400, 400)`
    - Gera uma URL falsa de uma imagem com 400x400 pixels
    - Exemplo: "https://picsum.photos/seed/12345/400/400"
- `'id_user' => User::pluck('id')->random()`
    - Pega todos os id da tabela users como uma coleção: [1, 2, 3, 4, 5]
    - `->random()` → Sorteia UM id aleatório dessa coleção
    - Pra vincular cada produto a um usuário existente

## Relacionamentos

1:1: contatos
- contatos:users
- contatos possui `foreign key` de user

N:N: regra_user
- regras:Users
- é criado uma tabela `regra_user` que relaciona as duas tabelas. Com a cheva estrangeira de regras e de users

migration regras cria duas tabelas: regras e regra_user

## Introdução a Views (blade)
rederiza o HTML. acessa Route->Controller->view
- .blade é um sistema de templates do laravel

pode ser passado parametros para a view:
```laravel
// no Controller
[...]
return view('perfil', compact('nome', 'idade', 'html'));
```

- `{!! $html !!}`: interpreta o html
- `{{ $text }}`: ignora tudo e mostra em formato de texto

### Section, Yield e Extends
> Diretivas

**@extends**
Define que a view atual vai herdar o layout de outra view (o template pai). fica sempre na primeira linha da view filha.

*Exemplo*: `@extends('layouts.app')` → "Essa página vai usar o layout app.blade.php como base"

**@section**
Define um bloco de conteúdo que vai ser injetado no layout. Fica nas views filhas (que estendem um layout).

*Exemplo:* `@section('content') <h1>Meu conteúdo</h1> @endsection` → "Esse conteúdo vai ocupar o lugar do `@yield('content')` no layout"

**@yield**
Marca um espaço no layout onde o conteúdo das `@section` vai ser inserido. Fica no layout pai (o template que vai ser estendido)

*Exemplo*: `@yield('content')` → "Aqui vai entrar todo o conteúdo que as views filhas colocarem dentro de `@section('content')`"


### Comentários e Operador Ternário (e valor padrão)
**Comentario:**
- `{{-- comentario --}}` 
**Operador Ternário**
- `isset()`: se existe
- `isset($tal) ? 'true' : 'false'`
**Valor padrão (pra definir variável):**
- `{{ $variavel ?? 'padrão' }}`


### Customizar Erros
- Cria uma pasta em `views` com o nome *'errors'*
- Adiciona o arquivo nomeado com o código do erro. *Exemplo*: `404.blade.php`


### Estruturas de Controle (blade)

- `if, else`
- `unless else`: se for falso ele entra na condição
- `switch case`
- `isset`: verifica se existe a variável
- `empty`: verifica se a variável está vazia
- `auth`: verifica se o usuário está autenticado
- `guest`: verifica se o usuário não está autenticado

### Estruturas de Repetição
@php: para definir variáveis em uma linha e codigo php

- `for`
- `while`
- `foreach`: para listas
- `forelse`: for com else

### Include e Component

**Include** vai na pagina de destino, na inteção de incluir outra "pagina" onde o `include` está sendo chamado.
*Exemplo*:
```laravel
# view/includes/mensagem.blade.php
<h1>{{ $titulo }}</h1>
<p>mensagem</p>
```
```laravel
# view/layout.blade.php
    @include('includes.mensagem', ['titulo' => 'Mensagem de Teste'])
```
- parametro com mensagem dinamica


**Component** é praticamente a mesma coisa do include, mas existe a possibilidade de enviar de voltar mensagem dinamica com `@slot`
```laravel
# view/component/sidebar.blade.php
<div style="background-color: #050505; padding: 20px;">
    <h2>{{ $titulo }}</h2>
    <ul>
        <li><a href="#">Link 1</a></li>
        <li><a href="#">Link 2</a></li>
        <li><a href="#">Link 3</a></li>
    </ul>
</div>
```
```laravel
# view/layout.blade.php
    @component('components.sidebar')
        @slot('titulo')
            Titulo Sidebar
        @endslot
    @endcomponent
```

### Stack e Push

> Controlam em quais views que seram rederizados stilos, scripts ou arquivos externos

o que tá na push mostra na stack

    @push(codigo/link) ----> @stack(sobre alteração)

- então eu posso ter a pag1, pag2, pag3 cada um com seu link de Style ou Script que enviam para o masmo layout

### Viewcache e Viewclear

O Laravel, por padrão, ele compila as view por demanda, escolhe o melhor momento para compilar as view e ele se encarrega de verificar se a view foi atualizada, se foi modificada, pra verificar se há a necessidade dele recompilar a view.

- `php artisan view:cache`: força pré compilar(não recomendado)
- `php artisan view:clear`: limpar o cache das views. Em casos de está travado e não está atualizando as modificações realizadas

### Implementando Materialize CSS

Será implementado vai CDN(*carregar diretamente dos servidores*), pegando apenas os links para a utilização.

importação e utilização atravez do [site](https://materializecss.com/)


<!-- ## Listagem de produtos

## Paginação de Resultados

## Criando SiteController

## Listagem de único produto -->

## OneToMany Inverse / belongsTo
**belognsTo(coluna da tabela)**
- Ele server para fazer buscas de parametro/valor em um campo de uma tabela. Aqui ele está sendo usado para buscar o id de uma tabela relacionada e retornar essa tabela. `Indicar que o modelo atual possui uma chave estrangeira que aponta para outro modelo`
- returna a tabela com o mesmo valor na coluna passada por parametro

*Exemplo:*
```php
// no Modelo Produto
public function user() {
    return $this->belongsTo(User::class, 'id_user');
} // ao chamar essa função `$produto->user` ela retorna a tabela User com o id passado
```

## Categorias dinâmicas com viewShare

**Dropdwon**: elemento de caixa de seleção no menu;

pra Carregar essa lista apenas uma vez na inicialização do site, ou seja, ela não precisa ser carregada varias vezess em outros locais, ela fica disponível em todas as partes.

`Providers.AppServiceProvider.php->boot` a função boot é executada ao iniciar o sistema
```php
public function boot(): void
    {
        $valores = Categoria::all();
        view()->share('valoresCompartilhadosEntreViews', $valores)
    }
```
- Carregado as categorias no dropdown
```php
// layout.blade.php
@foreach ($categoriasMenu as $categoria)
    <li><a href="{{route('site.categoria', $categoria->id)}}">{{$categoria->nome}}</a></li>
@endforeach
```

## Listar produtos de uma categoria e Mostrar nome de uma categoria
### Listar produtos de uma categoria
- criado a rota 
```php
// web.php
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');
```
- Fazendao a função
```php
// SiteController
public function categoria($id){ // recebe id da categoria pela rota
    $categoria = Categoria::find($id); // Busca pelo id automaticamente
    $produtos = Produto::where('id_categoria', $id)->paginate(3);
    return view('site.categoria', compact('produtos', 'categoria'));
}
```
- É carregado no blade
```php
// categoria.blade.php
<h5> Categoria: {{$categoria->nome}}</h5>
@foreach ($produtos as $produto)
<div class="col s12 m4">
    <div class="card">
    <div class="card-image" >
        <img width="200" height="200" src="{{$produto->imagem}}">
        <a href="{{ route('site.details', $produto->slug) }}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
    </div>
    <div class="card-content">
        <span class="card-title">{{$produto->nome}}</span>
        <p>{{Str::limit($produto->descricao, 20)}}</p>
    </div>
    </div>
</div>
@endforeach
```

- Formatação do preço no `details.blade` 
```php
// datail.blade.php
{{-- number_format(valor, casas, 'separador_decimal', 'separador_milhar') --}}
<p>R$ {{number_format($produto->preco, 2, ',','.')}}</p>
```

---
## Referencia
- Esse estudo esta sendo feito acompanhando a seguinte playlist no youtube.
Playlist: [Curso de Laravel](https://www.youtube.com/watch?v=SnOlhaJTMTA&list=PLwXQLZ3FdTVH5Tb57_-ll_r0VhNz9RrXb)


---
<!-- 

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->
