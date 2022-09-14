<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edit de Tipo produto</title>
</head>
<body>
    <div class="container"> 
        <form method="POST" action="{{route("tipoproduto.update", $tipoproduto->id)}}">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <div class="mb-3">
              <label for="id-input-ID" class="form-label">ID</label>
              <input type="text" class="form-control" id="id-input-ID"  placeholder="#" disabled value="{{$tipoproduto->id}}">
              {{--<div id="id-Help-ID" class="form-text">Não é necessário informar o Id para cadastrar um novo Produto.</div>--}}
            </div>
            <div class="mb-3">
              <label for="id-input-descricao" class="form-label">Descrição</label>
              <input type="text" name="descricao" class="form-control" id="id-input-descricao" placeholder="digite a descrição" value="{{$tipoproduto->descricao}}">
            </div>
            
                
            
            <div class="form-group my-2">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{route("tipoproduto.index")}}" class="btn btn-danger">Voltar</a>
        </div>
          </form>
        </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>