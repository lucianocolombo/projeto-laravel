<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\TipoProduto;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // uma consulta no banco de dados usando DB retorna um array (vetor)
        //[objeto1, objeto2, objeto3]
        $produtos = DB::select("SELECT produtos.id,
                                        produtos.nome,
                                        produtos.preco,
                                        produtos.Tipo_Produtos_id,
                                        tipo_produtos.descricao
                                    FROM produtos
                                    JOIN tipo_produtos
                                    ON produtos.Tipo_Produtos_id = tipo_produtos.id
                                    ORDER BY produtos.id;");

       
        return view("Produto/index")->with('produtos', $produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoProdutos = DB::select("SELECT * FROM tipo_produtos");
       // print_r($tipoProdutos);

        return view("produto/create")->with("tipoProdutos",$tipoProdutos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        if($request->Tipo_Produtos_id != "null" )
        {
             $Produto = new Produto();
        $Produto->nome = $request->nome;
        $Produto->preco = $request->preco;
        $Produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
        $Produto->save(); 
        }
      

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
        //echo $id;
        //buscas usanoo models(anteriormente usado a classe DB) 
        $produto = Produto::find($id);
        //print_r ($produto);

        if(isset($produto) )

     {
         $tipoProdutos = TipoProduto::all();
        
        return  view("Produto/Show")->with("produto", $produto)->with("tipoProdutos", $tipoProdutos);
    }
        else{
        echo"produto não encontrado";
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
     //  echo "Método edit de Produto chamado com id:" . $id . "<br>";
        $produto = Produto::find($id); //retorna objeto
        // $produto = Produto::where('Tipo_Produtos_id', 1)->get(); // Retorna um array
        // $produto = DB::select("SELECT * FROM PRODUTOS WHERE id = ?", [$id])[0]; // Retorna um objeto (por causa do [0])
        // $produtos = DB::select("SELECT * FROM PRODUTOS WHERE preco = ?", [8]); // Retorna um array
        // foreach($produtos as $produto) {
        //     print_r($produto);
        //     echo '<br><br>';
        // }
       // print_r($produto);
        if(isset($produto)){
            $tipoProdutos= TipoProduto::all();
            return view("Produto/edit")->with("produto", $produto)->with("tipoProdutos",$tipoProdutos);
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
        $produto= Produto::find($id);
        if(isset($produto)){
            $produto->nome= $request->nome;
            $produto->preco= $request->preco;
            $produto->Tipo_Produtos_id= $request->Tipo_Produtos_id;
            $produto-> update();
        }
        return $this ->index();
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
        $produto = Produto::find($id);
        //print_r($produto);
        // Se o produto foi encontrado
        if( isset($produto) ){
            $produto->delete();
        }
        return $this->index();
    }
}
