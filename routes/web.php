<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sistema\AuthController;
use App\Http\Controllers\Sistema\PasswordResetController;
use App\Http\Controllers\Sistema\UsuarioController;
use App\Http\Controllers\Sistema\ClienteController;
use App\Http\Controllers\Sistema\IdeiaController;
use App\Http\Controllers\Sistema\AprovacaoController;
use App\Http\Controllers\Sistema\AlteracaoController;
use App\Http\Controllers\Sistema\ImagemIdeiaController;
use App\Http\Controllers\Sistema\ImagemAprovacaoController;
use App\Http\Controllers\Sistema\ProdutoController;

/* Login */
Route::group(['prefix' => '/', 'namespace' => 'Sistema'], function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [AuthController::class, 'redirect'])->name('/');

    // Rotas para resetar a senha
    Route::group(['prefix' => 'password'], function () {
        Route::get('/forget', [PasswordResetController::class, 'showForgetForm'])->name('password.forget');
        Route::post('/forget', [PasswordResetController::class, 'postForgetForm'])->name('password.post');
        Route::get('/reset/{token}', [PasswordResetController::class, 'resetPassword'])->name('password.reset');
        Route::post('/reset', [PasswordResetController::class, 'resetPasswordPost'])->name('password.reset.post');
    });
});

/* Rotas do Sistema */
Route::group(['middleware' => 'auth', 'prefix' => '/'], function () {
    /* Pagina Inicial */
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    /* Rotas dos usuarios */
    Route::resource('usuarios', UsuarioController::class);

    Route::prefix('usuarios')->name('usuarios.')->group(function () {
        Route::post('multi-delete', [UsuarioController::class, 'multiDelete'])->name('multi-delete');
        Route::patch('update-email/{id}', [UsuarioController::class, 'changeEmail'])->name('update-email');
        Route::patch('update-password/{id}', [UsuarioController::class, 'changePassword'])->name('update-password');
    });

    /* Rotas dos clientes */
    Route::resource('clientes', ClienteController::class)->middleware('can:admin');

    Route::prefix('clientes')->name('clientes.')->group(function () {
        Route::post('multi-delete', [ClienteController::class, 'multiDelete'])->name('multi-delete')->middleware('can:admin');
    });

    /* Rotas das ideias */
    Route::resource('ideias', IdeiaController::class);

    Route::prefix('ideias')->name('ideias.')->group(function () {
        Route::post('multi-delete', [IdeiaController::class, 'multiDelete'])->name('multi-delete');
        Route::get('images/{id}', [IdeiaController::class, 'createImages'])->name('images');
    });

    /* Rotas das ideias imagens */
    Route::prefix('ideias-imagens')->name('ideias-imagens.')->group(function () {
        Route::post('upload-imagem', [ImagemIdeiaController::class, 'uploadImages'])->name('upload-imagem');
        Route::get('download-imagem/{id}', [ImagemIdeiaController::class, 'downloadImage'])->name('download-imagem');
        Route::get('delete-imagem/{id}', [ImagemIdeiaController::class, 'deleteImage'])->name('delete-imagem');
        Route::post('create-subtitle', [ImagemIdeiaController::class, 'createSubtitleImage'])->name('create-subtitle');
    });

    /* Rotas das aprovações */
    Route::resource('aprovacoes', AprovacaoController::class);

    Route::prefix('aprovacoes')->name('aprovacoes.')->group(function () {
        Route::post('multi-delete', [AprovacaoController::class, 'multiDelete'])->name('multi-delete');
        Route::get('images/{id}', [AprovacaoController::class, 'createImages'])->name('images');
        Route::post('update-status', [AprovacaoController::class, 'updateStatus'])->name('update-status');
    });

    /* Rotas das aprovações imagens */
    Route::prefix('aprovacoes-imagens')->name('aprovacoes-imagens.')->group(function () {
        Route::post('upload-imagem', [ImagemAprovacaoController::class, 'uploadImages'])->name('upload-imagem');
        Route::get('download-imagem/{id}', [ImagemAprovacaoController::class, 'downloadImage'])->name('download-imagem');
        Route::get('delete-imagem/{id}', [ImagemAprovacaoController::class, 'deleteImage'])->name('delete-imagem');
        Route::post('create-subtitle', [ImagemAprovacaoController::class, 'createSubtitleImage'])->name('create-subtitle');
    });

    /* Rotas das alterações */
    Route::prefix('alteracoes')->name('alteracoes.')->group(function () {
        Route::post('change-status', [AlteracaoController::class, 'changeStatus'])->name('change-status');
        Route::post('create-alteracao', [AlteracaoController::class, 'createAlteracao'])->name('create-alteracao');
    });

    /* Rotas para fazer Exportação da tabela PDF */
    //Route::get('/exportar-pdf', 'ExportController@exportarPDF')->name('exportar.pdf');

    /* Rotas dos Produtos */
    //Route::resource('produtos', ProdutoController::class);
});
