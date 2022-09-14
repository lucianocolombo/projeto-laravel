<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Create Produto</title>
</head>
<body>
  <div class="container"> 
    <form method="POST" action="{{route("produto.store")}}">
        @csrf
        <div class="mb-3">
          <label for="id-input-ID" class="form-label">ID</label>
          <input type="email" class="form-control" id="id-input-ID" aria-describedby="id-Help-ID" placeholder="#" disabled>
          <div id="id-Help-ID" class="form-text">Não é necessário informar o Id para cadastrar um novo Produto.</div>
        </div>
        <div class="mb-3">
          <label for="id-input-nome" class="form-label">Nome</label>
          <input type="text" name="nome" class="form-control" id="id-input-nome" placeholder="digite o Nome">
        </div>
        <div class="mb-3">
            <label for="id-input-preco" class="form-label">Preço</label>
            <input type="decimal" name="preco" class="form-control" id="id-input-preco" placeholder="digite o preço">
          </div>

          <div class="mb-3">
            <label  for="id-input-tipo" class="form-label">Tipo</label>
           <!--  <input type="number" name="Tipo_Produtos_id" class="form-control" id="id-input-tipo" placeholder="digite o tipo">--> 

            <select class="form-select" name="Tipo_Produtos_id" aria-label="Default select example">
              
              <option value=null selected>Selecione um tipo</option>
              
              @foreach ($tipoProdutos as $tipoProduto)
                <option value="{{$tipoProduto->id}}" >{{$tipoProduto->descricao}}</option>
                  
              @endforeach
            </select>
            
          </div>
        <div class="form-group my-2">
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{route("produto.index")}}" class="btn btn-danger">Voltar</a>
    </div>
      </form>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>