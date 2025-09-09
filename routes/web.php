<?php

use App\Models\{
    User,
};
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/one-to-one', function () {
    $user = User::first();

    dd($user->preferences()->get());
});
