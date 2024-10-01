<x-app-layout>
<div class="container">
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
    @foreach ($image as $images)
    <div class="thumbnail">
        <h1>{{$images->title}}</h1>
        <img src="{{asset('storage/IMG/'.$images->files_name)}}" alt="{{$images->title}}">
        <div class="caption">
            <p>{{$images->describe}}</p>
        </div>
    </div>
    @endforeach

<div class="container">
    @foreach ($video as $videos)
    <div class="thumbnail">
    <h1> {{$videos->title}} </h1>
    <video controls style="width: 100%;
  height: auto;">
        <source src="{{asset('storage/VIDEO/'.$videos->files_name) }}" type="video/mp4">
    </video>
        <div class="caption">
        <p>{{$videos->describe}}</p>
        </div>
    </div>
    @endforeach
</div>
</x-app-layout>
<style>
    body {
        background-color: #f0f0f0; 
        padding: 10px; 
        justify-content: center; 
    }

    .container {
        display: flex; 
        padding: 40px; 
        flex-wrap: wrap; 
        justify-content: flex-start; 
        margin: -10px; 
        width: 100%; 
    }

    .thumbnail {
        border: 2px solid 
        border-radius: 8px; 
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
        overflow: hidden; 
        margin: 10px; 
        transition: transform 0.3s; 
        width: calc(25% - 20px); 
        display: flex; 
        flex-direction: column; 
        float: left;
        margin-right: 10px;
    }

    .thumbnail:hover {
        transform: scale(1.05); 
    }

    .thumbnail h1 {
        text-align: center;
        color: #2c3e50; 
        font-size: 1.2em;
        margin: 5px 0;
    }

    .thumbnail img {
        height: auto; 
    }

    .caption {
        padding: 8px; 
        background-color: #f9f9f9; 
        text-align: center;
        color: #7f8c8d; 
        font-size: 0.9em;
    }
</style>