<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Envie seu Video</title>
  <style>
    .styled-input {
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
        font-size: 16px;
        width: 300px;
    }
</style>
</head>
<body>
  @php
  
 // dump($video->files_name);
  
  @endphp
 <form action="{{ route('load.post') }}" method="POST" enctype="multipart/form-data">
   @csrf
   <label for="title">Título:</label><br>
    <input type="text" id="title" name="title" class="styled-input"><br><br>
    <label for="describe">Descrição:</label><br>
    <input type="text" id="describe" name="describe" class="styled-input"><br><br>
   <input type="file" placeholder="Envie seu Arquivo" name="image_path" class="styled-input">
 @error('file') <span class="error">{{ $message }}</span> 
 @enderror
 <br><br>
    <button type="submit" class="styled-input">Enviar</button>
</form>

@if (empty($files->files_name))
    
@else
    <img src="{{asset('storage/IMG/'.$files->files_name)}}" >
    <video controls>
        <source src="{{asset('storage/VIDEO/'.$files->files_name) }}" type="video/mp4">
    </video>
@endif
</body>
</html>
