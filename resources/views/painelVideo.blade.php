<x-app-layout>
<div class="container">
 <table class="table table-striped">
    <thead>
       <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Video</th>
            <th>Aprovar</th>
            <th>Deletar</th>
          
        </tr>
        </thead>
        <tbody>
            @foreach ($vd as $bfn)
            @if($bfn->adminCheck == 0)
            <tr>
              <td>{{ $bfn->id }}</td>
            <td>{{ $bfn->title }}</td>
            <td>{{ $bfn->describe }}</td>
              <td>  <video width="150" height="150" controls>
        <source src="{{asset('storage/VIDEO/'.$bfn->files_name) }}" type="video/mp4" ></video>
        </td>
        <td>
    <form action="{{ route('painelVideoEdit.post') }}" method="POST">
      @csrf
        <input type="hidden" name="id" value="{{ $bfn->id }}">
            <button type="submit" class="btn btn-success">Aprovar</button>
    </form>
</td>
      <td>    
       <form action="{{ route('painelVideoDelete.post') }}" method="POST">
       @csrf
        <input type="hidden" name="id" value="{{ $bfn->id }}">
           <button type="submit" class="btn btn-danger">Deletar</button>
       </form>
    </td>
          </tr>
            @endif
            @endforeach
        </tbody>
    </table>
  </div>
</x-app-layout>
