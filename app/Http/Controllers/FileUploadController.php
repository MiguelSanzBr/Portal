<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\images;
use App\Models\videos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;

class FileUploadController extends Controller
{
  
    public function fileUp()
    {
      $image=images::all()->last();
      $videos=videos::all()->last();
      return view('file',['image' => $image,'video'=>$videos]);
    }
    public function load(Request $request)
    {
$request->validate([
            'title' => 'required|max:255',
            'describe' => 'required|max:700',
            'image_path' => 'mimes:jpeg,png,jpg,gif,svg,mp4,mov,avi,mkv|max:2048'
        ],[
    'title.required' => 'O campo título é obrigatório.',
    'title.max' => 'O campo título deve ter no máximo 255 caracteres.',
    'describe.required' => 'O campo descrição é obrigatório.',
    'describe.max' => 'O campo descrição deve ter no máximo 700 caracteres.',
    'image_path.mimes' => 'O arquivo selecionado não é uma imagem válida ou excede o tamanho máximo de 2048 bytes.',
    'image_path.max' => 'O arquivo selecionado excede o tamanho máximo de 2048 bytes.'
]);
      $storage=Storage::disk('local');
      $user = Auth::id();
      $file = $request->file('image_path');
      
        
            if($request->hasFile('image_path'))
            {
           $imageNameComplet = $file->getClientOriginalName();
          $extension = $request->image_path->extension();
          $imageName = basename($file->getClientOriginalName(), '.' . $extension);
          $fileName = time() . '.' . $request->image_path->extension();
            }else{return redirect('file');}
            
    if($extension == "jpeg" ||          $extension == "png" ||
      $extension == "jpg" ||
      $extension == "gif" ||
      $extension == "svg" )
      {
        $save = $request->image_path->storeAs('/IMG',$fileName);
        $path = storage_path($save);   
        $exists = Storage::disk('local')->exists('IMG/'.$fileName);
      $images=images::Create([
         "title" => $request->title,
         "describe" => $request->describe,
         "files_path" => $path,
         "files_name" => $fileName,
         "user_id" => $user
        ]);
        }else if($extension == "mp4" ||          $extension == "mov" ||
        $extension == "avi" || 
        $extension == "mkv") 
        {
         $save = $request->image_path->storeAs('/VIDEO',$fileName);
        $path = storage_path($save);   
         $exists = Storage::disk('local')->exists('VIDEO/'.$fileName);
       $videos=videos::Create([
         "title" => $request->title,
         "describe" => $request->describe,
         "files_path" => $path,
         "files_name" => $fileName,
         "user_id" => $user
        ]);
        }else {
          die();
        }
     if (isset($images->exists) || 
     isset($videos->exists)) {
  return redirect()->route('dashboard')->with('mensagems', 'Arquivo enviado com sucesso');
       }
    }
}
