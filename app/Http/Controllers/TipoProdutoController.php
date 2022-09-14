<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProduto;
use Illuminate\Support\Facades\DB;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoProdutos = DB::select("SELECT * FROM tipo_produtos");
        //print_r($tipoProdutos);
        return view("tipoproduto/index")->with("tipoProdutos", $tipoProdutos);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // echo 'Método create chamado';
        return view("TipoProduto/Create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // echo "metodo store chamado<br>";
       // echo " $request->_token <br>";
       // echo " $request->descricao <br>";

        $tipoProduto = new TipoProduto();
        $tipoProduto-> descricao = $request->descricao;
        $tipoProduto->save();

        return $this->index();
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoProduto = TipoProduto::find($id);
       // print_r ($TipoProduto);

        if(isset($tipoProduto) )

     {
        
        return  view("TipoProduto/Show")->with("Tipoproduto", $tipoProduto);
    }
        else{
        echo"tipo de produto não encontrado";
    }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoproduto = TipoProduto::find($id);

        if(isset($tipoproduto)){
           
            return view("TipoProduto/edit")->with("tipoproduto", $tipoproduto);
        }
        else{
            return"Produto não encontrado";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipoProduto= TipoProduto::find($id);
        if(isset($tipoProduto))
        {
            $tipoProduto->descricao = $request->descricao;
            $tipoProduto->update();
             return $this ->index();
        }
        return 'Não encontrado update';
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //echo "Método destroy chamado <br>";
        $tipoProduto = TipoProduto::find($id);
        //print_r($tipoProduto);
        // Se o produto foi encontrado
        if( isset($tipoProduto) ){
            $tipoProduto->delete();
        }
        return $this->index();
    }
}
