<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Painel</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
      color: #343a40;
    }
    .container-fluid {
      margin-top: 50px;
      text-align: center;
    }
    h1 {
      margin-bottom: 30px;
      font-size: 2.5em;
      color: #007bff;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      transition: background-color 0.3s;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
    select.form-control {
      border-radius: 0.25rem;
      padding: 7px;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container-fluid">
    @if (empty($userChoice))
      <h1>Seja Bem Vindo Administrador</h1>
      <form action="{{ route('painel.get') }}" method="get">
        <div class="form-group">
          <label for="site_choice">Aonde Você quer ir:</label>
          <select class="form-control" id="site_choice" name="site_choice">
          <option>Painel Imagem</option>
          <option>Painel Video</option>
          <option>Promover Admin</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Selecionar</button>
      </form>
    @endif
  </div>
</body>
</html>

