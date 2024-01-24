<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sistema\AuthController;
use App\Http\Controllers\Sistema\PasswordResetController;
use App\Http\Controllers\Sistema\UsuarioController;
use App\Http\Controllers\Sistema\ClienteController;
use App\Http\Controllers\Sistema\IdeiaController;
use App\Http\Controllers\Sistema\AprovacaoController;
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
        // Rota para exclusão múltipla
        Route::post('multi-delete', [UsuarioController::class, 'multiDelete'])->name('multi-delete');
        // Rotas para atualização de e-mail e senha
        Route::patch('update-email/{id}', [UsuarioController::class, 'changeEmail'])->name('update-email');
        Route::patch('update-password/{id}', [UsuarioController::class, 'changePassword'])->name('update-password');
    });

    /* Rotas dos clientes */
    Route::resource('clientes', ClienteController::class)->middleware('can:admin');

    Route::prefix('clientes')->name('clientes.')->group(function () {
        // Rota para exclusão múltipla
        Route::post('multi-delete', [ClienteController::class, 'multiDelete'])->name('multi-delete')->middleware('can:admin');
    });

    /* Rotas das ideias */
    Route::resource('ideias', IdeiaController::class);

    Route::prefix('ideias')->name('ideias.')->group(function () {
        // Rota para exclusão múltipla
        Route::post('multi-delete', [IdeiaController::class, 'multiDelete'])->name('multi-delete');
        Route::post('upload-imagens', [IdeiaController::class, 'uploadImages'])->name('imagem-upload');
        Route::post('create-subtitle', [IdeiaController::class, 'createSubtitleImage'])->name('create-subtitle');
        Route::get('images/{id}', [IdeiaController::class, 'createImages'])->name('images');
        Route::get('download-imagem/{id}', [IdeiaController::class, 'download'])->name('imagem-download');
    });

    /* Rotas das aprovações */
    Route::resource('aprovacoes', AprovacaoController::class);

    /* Rotas para fazer Exportação da tabela PDF */
    //Route::get('/exportar-pdf', 'ExportController@exportarPDF')->name('exportar.pdf');

    /* Rotas dos Produtos */
    //Route::resource('produtos', ProdutoController::class);
});
