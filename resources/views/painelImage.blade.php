<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Painel Imagem</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @if(session('mensagem'))
    <div class="alert alert-success">
        <p>{{ session('mensagem') }}</p>
    </div> 
@endif
  <h1>Painel Admin</h1>
 <div class="container">
 <table class="table table-striped">
    <thead>
       <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Imagem</th>
            <th>Aprovar</th>
            <th>Deletar</th>
            
        </tr>
        </thead>
        <tbody>
            @foreach ($img as $bfn)
            @if($bfn->adminCheck == 0)
            <tr>
              <td>{{ $bfn->id }}</td>
              <td>{{ $bfn->title }}</td>
            <td>{{ $bfn->describe }}</td>
              <td> <img src="{{asset('storage/IMG/'.$bfn->files_name)}}" height="40"></td>
            <td>
       <form action="{{ route('painelImageEdit.post') }}" method="POST">
      @csrf
        <input type="hidden" name="id" value="{{ $bfn->id }}">
            <button type="submit" class="btn btn-success">Aprovar</button>
    </form>
</td>
               <td>    
               <form action="{{ route('painelImageDelete.post') }}" method="POST">
       @csrf
        <input type="hidden" name="id" value="{{ $bfn->id }}">
        <button type="submit" class="btn btn-danger">Deletar</button>
    </form></td>
          </tr>
            @endif
            @endforeach
        </tbody>
    </table>
   </div>
</body>
</html>
