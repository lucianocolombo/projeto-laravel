<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Index De tipo Produto</title>
</head>
<body>{{-- --}}
  
   <div class="container">
       <a href="{{route("tipoproduto.create")}}" class="btn btn-success" >Criar um novo Tipo de Produto</a>
       <a href="{{route("produto.index")}}" class="btn btn-outline-warning" >Ir para Produto</a>

       
       <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">descrição</th>
            <th scope="col">ação</th>
        </tr>
          </thead>
        <tbody>
            @foreach ($tipoProdutos as $tipoProduto)
            <tr>
                <th scope="row">{{$tipoProduto->id}}</th>
            
                 <td>{{$tipoProduto->descricao}}</td>
            <td>
                <a href="{{route("tipoproduto.show", $tipoProduto->id)}}" class="btn btn-primary"> Mostrar</a>
                <a href="{{route("tipoproduto.edit", $tipoProduto->id)}}" class="btn btn-success"> Editar</a>
                <button type="button" class="btn btn-danger btnRemover" data-bs-toggle="modal" 
                data-bs-target="#exampleModal" value="{{route("tipoproduto.destroy", $tipoProduto->id)}}">Remover</button>
          </td>

        </tr>
     @endforeach
    </tbody>
  </table>

   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Remover TipoProduto</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
                <div class="modal-body">
                Deseja mesmo remover este Tipo de Produto?
                
               </div>
                 <div class="modal-footer">
                   
                   <form id="id-form-modal-botao-remover" method="post" action="" style="display: inline;">
                       @csrf
                       <input name="_method" type="hidden" value="DELETE">
                       <input type="submit" value="Remover" class="btn btn-danger">
                   </form>
           </div>
        </div>
   </div>
 </div>

   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        //Declaro uma variável para receber todos os botões remover da página
        //Faço isso buscando todos os botões que estão configurados com a class btnremover (.btnRemover)
        let arrayBotaoRemover = document.querySelectorAll(".btnRemover");
        //crio uma referencia para o documento html no javascript
        let formModalBotaoRemover = document.querySelector("#id-form-modal-botao-remover");
        console.log(arrayBotaoRemover);
        //Como arrayBotaoRemover é um array, posso utilizar o forEach para percorrer todos os elementos
        arrayBotaoRemover.forEach(element => {
            // Para cada vez que o laço é executado, no botão é adicionado um evento de escuta.
            // Esse evento irá escutar um click sobre o botão, quando essa click acontecer, a função configuraBotaoRemover é executada
            element.addEventListener('click', configuraBotaoRemoverModal);
        });
        function configuraBotaoRemoverModal (){
            // O this em uma função faz referencia ao elemento (objeto) que chamou essa função.
            console.log(this.getAttribute("value"));
            //modifico o atributo action dentro do form com o conteudo do "value" escondido dentro do botao
            formModalBotaoRemover.setAttribute("action", this.getAttribute("value"));s
        }
    </script>
</body>
</html>