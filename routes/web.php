<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome'); // views/welcome.blade.php la dentro de resources/views
});



// ANY E MATCH
Route::any('/any', function(){
    return "Permite todo tipo de acesso http";
});

Route::match(['get', 'post'],'/match', function(){
    return "Permite acesso apenas a método http especificado no [ ]";
});


// PASSAGEM DE PARÂMETROS
Route::get('/produto/{id}/{categoria?}', function($id, $categoria = "indefinida"){
    return "Produto: ".$id."<br>"."A categoria é: ".$categoria;
});


// REDIRECIONAMENTO
Route::redirect('/sobre', '/'); // redireciona para a rota empresa A ROTA DEVE EXISTIR PARA O REDIRECIONAMENTO FUNCIONAR
Route::view('/empresa', 'site/empresa'); // views/empresa.blade.php la dentro de resources/views

// NOMEANDO ROTAS
Route::get('news', function(){
    return "Rota NOMEADA";
})->name('noticias'); // nomeando a rota
// utilzando o nome como referencia para acessar a rota
Route::get('novidades', function(){
    return redirect()->route('noticias');
});


// GRUPO DE ROTAS
// agrupando rotas com prefixo comum
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
// agrupando rotas com nome comum
Route::name('admin1.')->group(function(){
    Route::get('/admin1', function(){
        return "Página principal do admin1";
    })->name('main');
    Route::get('admin1/profile', function(){
        return "Perfil do admin1";
    })->name('profile');
    Route::get('admin1/settings', function(){
        return "Configurações do admin1";
    })->name('settings');
});
// agrupando rotas com prefixo e nome comum
Route::group([
    'prefix' => 'admin2',
    'as' => 'admin2.' // name
],function(){
    Route::get('/', function(){
        return "Página principal do admin2";
    })->name('main');
    Route::get('profile', function(){
        return "Perfil do admin2";
    })->name('profile');
    Route::get('settings', function(){
        return "Configurações do admin2";
    })->name('settings');
});


// Controller

use App\Http\Controllers\ProdutoController;

//               ([Controller e método])->nome da rota
Route::get('/param/{id?}', [ProdutoController::class, 'show'])->name('produto.show');


use App\Http\Controllers\ProdutoResourceController;

// Controller Resource
Route::resource('produtos', ProdutoResourceController::class); // gera rotas para as

use App\Http\Controllers\PerfilResourceController;
Route::resource('perfil', PerfilResourceController::class); // gera rotas para as

use App\Http\Controllers\HomeResourceController;
Route::get('/home', [HomeResourceController::class, 'index']);

use App\Http\Controllers\SiteController;
Route::get('/', [SiteController::class, 'index'])->name('site.index');

Route::get('/prod/{slug}', [SiteController::class, 'details'])->name('site.details');
