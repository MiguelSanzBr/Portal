<x-app-layout>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Envie Sua Mídia</title>
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

    <h1>Envie Sua Mídia</h1>
    <form action="{{ route('load.post') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" class="form-control styled-input">
        
        <label for="describe">Descrição:</label>
        <textarea class="form-control styled-input" id="describe" name="describe"></textarea>

        <label for="image_path">Envie seu Arquivo:</label>
        <input type="file" name="image_path" class="styled-input">
      </div>

      @error('title') <span class="alert alert-danger">{{ $message }}</span> @enderror
      @error('describe') <span class="alert alert-danger">{{ $message }}</span> @enderror
      @error('image_path') <span class="alert alert-danger">{{ $message }}</span> @enderror 

      <button type="submit" class="btn btn-submit">Enviar</button>
    </form>
  </div>
<style>  .container-fluid {
      max-width: 600px;
      margin: auto;
      margin-top : 3%;
      background-color: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #007bff;
    font-size: 2rem; /* Aumenta o tamanho da fonte */
    font-weight: bold; /* Torna o texto em negrito */
    line-height: 1.2; /* Melhora o espaçamento entre linhas */
    text-transform: uppercase;
    }
    .styled-input {
      border: 1px solid #ccc;
      padding: 10px;
      border-radius: 5px;
      font-size: 16px;
      width: 100%;
      margin-bottom: 20px;
    }
    .alert {
      margin-bottom: 20px;
    }
    .btn-submit {
      background-color: #007bff;
      color: white;
      width: 100%;
      padding: 10px;
      font-size: 18px;
      border: none;
      border-radius: 5px;
      transition: background-color 0.3s;
    }
    .btn-submit:hover {
      background-color: #0056b3;
    }</style>
  </x-app-layout>