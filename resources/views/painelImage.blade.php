<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Painel Img</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @if(session('mensagem'))
    <div class="alert alert-success">
        <p>{{ session('mensagem') }}</p>
    </div> 
@endif
  <h1>Painel Admin Img</h1>
 <table style="border-collapse: collapse; width: 100%;">
    <thead>
       <tr>
            <th style="background-color: #5f4b8b; padding: 8px; text-align: left; border-bottom: 1px solid #ddd; color: black;">ID</th>
            <th style="background-color: #5f4b8b; padding: 8px; text-align: left; border-bottom: 1px solid #ddd; color: black;">Titulo</th>
            <th style="background-color: #5f4b8b; padding: 8px; text-align: left; border-bottom: 1px solid #ddd; color: black;">Descrição</th>
            <th style="background-color: #5f4b8b; padding: 8px; text-align: left; border-bottom: 1px solid #ddd; color: black;">Imagem</th>
            <th style="background-color: #5f4b8b; padding: 8px; text-align: left; border-bottom: 1px solid #ddd; color: black;">Aprovar</th>
             <th style="background-color: #5f4b8b; padding: 8px; text-align: left; border-bottom: 1px solid #ddd; color: black;">Deletar</th>
            
        </tr>
        </thead>
        <tbody>
            @foreach ($img as $bfn)
            @if($bfn->adminCheck == 0)
            <tr>
              <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{ $bfn->id }}</td>
            <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{ $bfn->title }}</td>
            <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{ $bfn->describe }}</td>
              <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;"> <img src="{{asset('storage/IMG/'.$bfn->files_name)}}" height="40"></td>
<td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">
    <form action="{{ route('painelEdit.post') }}" method="POST">
      @csrf
        <input type="hidden" name="id" value="{{ $bfn->id }}">
            <button type="submit" class="btn btn-success">Aprovar</button>
    </form>
</td>
               <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">    
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
  
</body>
</html>
