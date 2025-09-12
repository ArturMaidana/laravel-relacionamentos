<?php

use App\Http\Livewire\ShowCategorias;
use App\Http\Livewire\ShowTweets;
use App\Http\Livewire\ShowMarcas;
use App\Http\Livewire\ShowSubCategorias;
use App\Http\Livewire\User\UploadPhoto;
use App\Models\{
    User,
};
use Illuminate\Support\Facades\Route;


Route::get('/upload', UploadPhoto::class)
            ->name('upload.photo.user')
            ->middleware('auth');

Route::any('/marcas', ShowMarcas::class)
            ->name('marcas.index')
            ->middleware('auth');

Route::any('/sub-categorias', ShowSubCategorias::class)
            ->name('sub.index')
            ->middleware('auth');

Route::any('/categorias', ShowCategorias::class)
            ->name('categorias.index')
            ->middleware('auth');



Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
