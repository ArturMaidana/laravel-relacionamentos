<?php

use App\Http\Livewire\ShowTweets;
use App\Models\{
    User,
};
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::any('/tweets', ShowTweets::class)->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
