<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Painel</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container-fluid">
 @if (empty($userChoice))
 <h1> Seja Bem Vindo Administrador </h1><br>
<form action="{{ route('painel.get') }}" method="get">
    @csrf
    <div class="form-group">
  <label for="site_choice">Aonde Voce quer ir:</label>
  <select class="form-control" id="site_choice" name="site_choice" >
    <option>Painel Imagem</option>
    <option>Painel Video</option>
    <option>Promover Admin</option>
  </select>
  <button type="submit" class="btn btn-primary btn-block">Selecionar</button>
</form>
@endif
</div>
</body>
</html>

