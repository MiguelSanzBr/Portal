<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Painel</title>
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
    .btn {
    display: inline-block;
    padding: 12px 24px; /* Ajusta o espaçamento interno */
    font-size: 1.2rem; /* Aumenta o tamanho da fonte */
    font-weight: bold; /* Deixa o texto em negrito */
    color: #fff; /* Cor do texto */
    background-color: #007bff; /* Cor de fundo */
    border: none; /* Remove a borda padrão */
    border-radius: 5px; /* Bordas arredondadas */
    cursor: pointer; /* Muda o cursor ao passar o mouse */
    text-align: center; /* Centraliza o texto */
    transition: background-color 0.3s, transform 0.3s; /* Animação suave */
}

.btn:hover {
    background-color: #0056b3; /* Cor de fundo ao passar o mouse */
    transform: scale(1.05); /* Leve aumento de tamanho ao passar o mouse */
}

.btn:active {
    transform: scale(0.95); /* Leve diminuição ao clicar */
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
          <select class="form-control-sm" id="site_choice" name="site_choice">
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
  </x-app-layout>