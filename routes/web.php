<?php

use Illuminate\Support\Facades\Route;
use App\Models\Produto;

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
Route::get("ola/{nome}/{sobrenome}", function ($nome, $sobrenome) {
    echo "Olá! Seja bem vindo $nome $sobrenome.";
    
});
Route::get('ola/{nome?}', function ($nome=null) {
    if($nome ==null)
    echo "(Parâmetro opcional)Olá! Seja bem vindo anonimo.";
    else
    echo "(Parâmetro opcional)Olá! Seja bem vindo $nome.";
});
Route::get('rotacomregra/{nome}/{n}', function ($nome, $n) {
    for ($i=0; $i < $n ; $i++) { 
        echo "meu nome é $nome. <br>";
    }

});
route::prefix('/app')->group(function(){

Route::get('/', function () {
    echo "pagina do app";
});
Route::get('users', function () {
   echo "pagina de users do app";
});
Route::get('admin', function () {
    echo "pagina de adimin  do app";
});

});Route::get("produto/add/{nome}/{preco}/{tipo}", function($nome, $preco, $tipo){
echo "Inserir banco de daos: $nome - $preco - $tipo";
 $produto = new Produto();
 $produto->nome = $nome;
 $produto->preco = $preco;
 $produto->Tipo_Produtos_id = $tipo;
 $produto->save();

});

//Route::get('tipoproduto', "App\Http\Controllers\TipoProdutoController@index") ;
//Route::get('tipoproduto/create', "App\Http\Controllers\TipoProdutoController@create") ;   
//0Route::get('tipoproduto/{id}edit', "App\Http\Controllers\TipoProdutoController@edit") ;

Route::resource('tipoproduto',"App\Http\Controllers\TipoProdutoController");
Route::resource('produto', "App\Http\Controllers\ProdutoController");
