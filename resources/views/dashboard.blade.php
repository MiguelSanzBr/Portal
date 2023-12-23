<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
@foreach ($image as $images)
   <div class="thumbnail">
      <h1> {{$images->title}} </h1>
        <img src="{{asset('storage/IMG/'.$images->files_name)}}" style="width:100%">
        <div class="caption">
          <p>{{$images->describe}}</p>
        </div>
    </div>
  <hr>
 @endforeach 
@foreach ($video as $videos)
<hr>
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
  </div>
  <hr>
</x-app-layout>
