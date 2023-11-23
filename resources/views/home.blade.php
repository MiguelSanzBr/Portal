<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
 <link rel="stylesheet" href="css/home.css"> 
</head>
<body>
<div class="header">
  <a href="#default" class="logo">Portal</a>
  <div class="header-right">
    <a class="active" href="{{route('home.get')}}">Home</a>
    <a href="{{route('login.get')}}">Logar</a>
    <a href="{{route('fileUp.get')}}">File</a>
  </div>
</div>
</body>
</html>