<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Envie Sua Midia</title>
  <style>
    .styled-input {
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
        font-size: 16px;
        width: 230px;
    }
</style>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container-fluid">
  @if(session('mensagems'))
    <div class="alert alert-success">
        <p>{{ session('mensagems') }}</p>
    </div> 
@endif

@if(session('mensagemf'))
<div class="alert alert-danger">
        <p>{{ session('mensagemf') }}</p>
    </div> 
@endif


 <form action="{{ route('load.post') }}" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="form-group">
   <label for="title">Título:</label><br>
    <input type="text" id="title" name="title" class="form-control">
    <label for="describe">Descrição:</label><br>
   <textarea class="form-control" id="describe" name="describe" class="styled-input"></textarea><br>
   <input type="file" placeholder="Envie seu Arquivo" name="image_path" class="styled-input"></div>
 @error('title') <span class="alert alert-danger">{{ $message }}</span> 
 @enderror
 @error('describe') <span class="alert alert-danger">{{ $message }}</span> 
 @enderror
@error('image_path') <span class="alert alert-danger">{{ $message }}</span> 
 @enderror 
 <br><br>
    <button type="submit" class="btn btn-default btn-lg">Enviar</button>
</form>

</div>
</body>
</html>
