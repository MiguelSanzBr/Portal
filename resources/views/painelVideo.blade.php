<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Painel</title>
</head>
<body>
  
  <h1>Painel Admin</h1>
 <table style="border-collapse: collapse; width: 100%;">
    <thead>
       <tr>
            <th style="background-color: #5f4b8b; padding: 8px; text-align: left; border-bottom: 1px solid #ddd; color: black;">ID</th>
            <th style="background-color: #5f4b8b; padding: 8px; text-align: left; border-bottom: 1px solid #ddd; color: black;">Titulo</th>
            <th style="background-color: #5f4b8b; padding: 8px; text-align: left; border-bottom: 1px solid #ddd; color: black;">Descrição</th>
            <th style="background-color: #5f4b8b; padding: 8px; text-align: left; border-bottom: 1px solid #ddd; color: black;">Video</th>
          
        </tr>
        </thead>
        <tbody>
            @foreach ($vd as $bfn)
            <tr>
              <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{ $bfn->id }}</td>
            <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{ $bfn->title }}</td>
            <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">{{ $bfn->describe }}</td>
              <td style="padding: 8px; text-align: left; border-bottom: 1px solid #ddd;">  <video width="150" height="150" controls>
        <source src="{{asset('storage/VIDEO/'.$bfn->files_name) }}" type="video/mp4" ></video>
        </td>

          </tr>
            @endforeach
        </tbody>
    </table>
  
</body>
</html>
