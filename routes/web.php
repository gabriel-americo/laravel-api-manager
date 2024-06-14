<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\ApprovalImagesController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\IdeaController;
use App\Http\Controllers\Admin\IdeaImageController;
use App\Http\Controllers\Admin\ModificationController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'status'], 'prefix' => '/'], function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::resource('usuarios', UserController::class);

    Route::prefix('usuarios')->name('usuarios.')->group(function () {
        Route::post('multi-delete', [UserController::class, 'multiDelete'])->name('multi-delete');
        Route::patch('update-email/{id}', [UserController::class, 'changeEmail'])->name('update-email');
        Route::patch('update-password/{id}', [UserController::class, 'changePassword'])->name('update-password');
    });

    Route::resource('clientes', CustomerController::class)->middleware('admin');

    Route::prefix('clientes')->name('clientes.')->group(function () {
        Route::post('multi-delete', [CustomerController::class, 'multiDelete'])->name('multi-delete')->middleware('admin');
    });

    Route::resource('ideias', IdeaController::class);

    Route::prefix('ideias')->name('ideias.')->group(function () {
        Route::post('multi-delete', [IdeaController::class, 'multiDelete'])->name('multi-delete');
        Route::get('images/{id}', [IdeaController::class, 'createImages'])->name('images');
    });

    Route::prefix('ideias-imagens')->name('ideias-imagens.')->group(function () {
        Route::post('upload-imagem', [IdeaImageController::class, 'uploadImages'])->name('upload-imagem');
        Route::get('download-imagem/{id}', [IdeaImageController::class, 'downloadImage'])->name('download-imagem');
        Route::get('delete-imagem/{id}', [IdeaImageController::class, 'deleteImage'])->name('delete-imagem');
        Route::post('create-subtitle', [IdeaImageController::class, 'createSubtitleImage'])->name('create-subtitle');
    });

    Route::resource('aprovacoes', ApprovalController::class);

    Route::prefix('aprovacoes')->name('aprovacoes.')->group(function () {
        Route::post('multi-delete', [ApprovalController::class, 'multiDelete'])->name('multi-delete');
        Route::get('images/{id}', [ApprovalController::class, 'createImages'])->name('images');
        Route::post('update-status', [ApprovalController::class, 'updateStatus'])->name('update-status');
    });

    Route::prefix('aprovacoes-imagens')->name('aprovacoes-imagens.')->group(function () {
        Route::post('upload-imagem', [ApprovalImagesController::class, 'uploadImages'])->name('upload-imagem');
        Route::get('download-imagem/{id}', [ApprovalImagesController::class, 'downloadImage'])->name('download-imagem');
        Route::get('delete-imagem/{id}', [ApprovalImagesController::class, 'deleteImage'])->name('delete-imagem');
        Route::post('create-subtitle', [ApprovalImagesController::class, 'createSubtitleImage'])->name('create-subtitle');
    });

    Route::prefix('alteracoes')->name('alteracoes.')->group(function () {
        Route::post('change-status', [ModificationController::class, 'changeStatus'])->name('change-status');
        Route::post('create-alteracao', [ModificationController::class, 'createAlteracao'])->name('create-alteracao');
    });
});

require __DIR__.'/auth.php';
