<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Painel User</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @if(session('mensagem'))
    <div class="alert alert-success">
        <p>{{ session('mensagem') }}</p>
    </div> 
@endif

  <h1>Painel Admin</h1>
 <div class="container">
 <table class="table table-striped">
    <thead>
       <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Cargo</th>
            <th>Promover</th>
            <th>Rebaixar</th>
            
        </tr>
        </thead>
        <tbody>
            @foreach ($user as $bfn)
            
            <tr>
              <td>{{ $bfn->id }}</td>
              <td>{{ $bfn->name }}</td>
            <td>{{ $bfn->email }}</td>
            @if($bfn->admin == 0)
            <td>USUARIO</td>
            @else
             <td>ADMIN</td> 
            @endif
          @if ($bfn->id !== auth()->id())
           <td>
       <form action="{{ route('painelUserEdit.post') }}" method="POST">
      @csrf
        <input type="hidden" name="id" value="{{ $bfn->id }}">
            <button type="submit" class="btn btn-success">Promover</button>
    </form>
</td>
               <td>    
               <form action="{{ route('painelUserDelete.post') }}" method="POST">
       @csrf
        <input type="hidden" name="id" value="{{ $bfn->id }}">
        <button type="submit" class="btn btn-danger">Rebaixar</button>
    </form></td>
          </tr>
            @endif
            @endforeach
        </tbody>
    </table>
   </div>
</body>
</html>
