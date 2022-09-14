<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container"> 
        <form method="POST" action="{{route("tipoproduto.store")}}">
            @csrf
            <div class="mb-3">
              <label for="id-input-ID" class="form-label">ID</label>
              <input type="email" class="form-control" id="id-input-ID" aria-describedby="id-Help-ID"  value="{{$Tipoproduto->id}}" disabled>
              <div id="id-Help-ID" class="form-text">Não é necessário informar o Id para cadastrar um novo dado.</div>
            </div>
            <div class="mb-3">
              <label for="id-input-descricao" class="form-label">Descrição</label>
              <input type="text" name="descricao" class="form-control" id="id-input-descricao"  value="{{$Tipoproduto->descricao}}" disabled>
            </div>

            <div class="mb-3">
              <label for="id-input-updated_at" class="form-label">Ultima atualização</label>
              <input type="text" name="updated_at" class="form-control" id="id-input-updated_at" value="{{$Tipoproduto->updated_at}}"disabled >
            </div>

            <div class="mb-3">
              <label for="id-input-created_at" class="form-label">Data de criação</label>
              <input type="text" name="created_at" class="form-control" id="id-input-created_at" value="{{$Tipoproduto->created_at}}"disabled >
            </div>
  

            <div class="form-group my-2">
              
              <a href="{{route("tipoproduto.index")}}" class="btn btn-danger">Voltar</a>
          </div>
        </div>
          </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>