<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Sistema\AuthController;
use App\Http\Controllers\Sistema\UsuariosController;
use App\Http\Controllers\Sistema\ClientesController;
use App\Http\Controllers\Sistema\IdeiasController;
use App\Http\Controllers\Sistema\AprovacoesController;
use App\Http\Controllers\Sistema\ProdutosController;

/* Login */
Route::group(['prefix' => '/', 'namespace' => 'Sistema'], function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [AuthController::class, 'redirect'])->name('/');
});

/* Rotas do Sistema */
Route::group(['middleware' => 'auth', 'prefix' => '/'], function () {
    /* Pagina Inicial */
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    /* Rotas dos usuarios */
    Route::resource('usuarios', UsuariosController::class);

    Route::prefix('usuarios')->name('usuarios.')->group(function () {
        // Rota personalizada para alterar senha
        Route::put('changePassword/{id}', [UsuariosController::class, 'changePassword'])->name('changePassword');

        // Rota personalizada para exclusão múltipla
        Route::post('multi-delete', [UsuariosController::class, 'multiDelete'])->name('multi-delete');
    });

    /* Rotas dos clientes */
    Route::resource('clientes', ClientesController::class);

    Route::prefix('clientes')->name('clientes.')->group(function () {
        // Rota personalizada para exclusão múltipla
        Route::post('multi-delete', [ClientesController::class, 'multiDelete'])->name('multi-delete');
    });

    /* Rotas das ideias */
    Route::resource('ideias', IdeiasController::class);

    Route::prefix('ideias')->name('ideias.')->group(function () {
        // Rota personalizada para exclusão múltipla
        Route::post('multi-delete', [IdeiasController::class, 'multiDelete'])->name('multi-delete');
        Route::get('images/{id}', [IdeiasController::class, 'createImages'])->name('images');
        Route::get('/download-imagem/{id}', [IdeiasController::class, 'download'])->name('imagem.download');
    });

    /* Rotas das aprovações */
    Route::resource('aprovacoes', AprovacoesController::class);

    /* Rotas para fazer Exportação da tabela PDF */
    //Route::get('/exportar-pdf', 'ExportController@exportarPDF')->name('exportar.pdf');

    /* Rotas dos Produtos */
    //Route::resource('produtos', ProdutosController::class);
});
