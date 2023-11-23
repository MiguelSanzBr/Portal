<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="css/lg.css"> 
</head>
<body>
  <form action="{{ route('logs.post') }}" method="POST"> 
  @csrf
 <label><h2>Email:  </h2></label>
  <input type="text" name="email" class="@error('email', 'get') is-invalid @enderror" value="{{ old('email') }}">
  @error('email')
    {{ $message }}
  @enderror
<br>
 <label><h2>Senha: </h2> </label>
  <input type="text" name="password" class="@error('password', 'get') is-invalid @enderror">
   @error('password')
    {{ $message }}
  @enderror
  <br>
  <input class="botao" type="submit" name="botao">
  <a href="{{route('register.get') }}"> Não tem conta? Crie Agora</a>
  </form>
</body>
</html>