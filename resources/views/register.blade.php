<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registrar</title>
  <link rel="stylesheet" href="css/rg.css"> 
</head>
<body>
<form action="{{ route('filter.post') }}" method="POST">
  @csrf
  <h1> Registrar </h1>
  <label><h2>Nome:  </h2></label>
  <input type="text" name="name">
  <br> 
  <label><h2>Email:  </h2></label>
  <input type="text" name="email">
  <br>
  <label><h2>Senha: </h2> </label>
  <input type="password" name="password">
  <br>
    <label><h2>Confirme sua Senha: </h2> </label>
  <input type="password" name="password_confirmation">
  <br>
  <input class="botao" type="submit" name="botao">
</form>
</body>
</html>