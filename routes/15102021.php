<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('bemvindo');
});

Route::get('teste', function () {
    echo '<html>';
    echo '<h1>teste</h1>';
    echo '</html>';
});
Route::get('ola/{nome}/{sobrenome}', function ($nome, $sobrenome) {
    echo "Olá! Seja bem vindo $nome $sobrenome.";
    
});