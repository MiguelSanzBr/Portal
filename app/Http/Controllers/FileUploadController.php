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
        images::Create([
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
         videos::Create([
         "title" => $request->title,
         "describe" => $request->describe,
         "files_path" => $path,
         "files_name" => $fileName,
         "user_id" => $user
        ]);
        }else {
          return redirect()->action([\App\Http\Controllers\FileUploadController::class, 'fileUp'])->with('mensagem', 'a Extenção do seu arquivo é invalida');
        }
        
    // return view('file',['name' => $fileName]);
      return redirect()->action([\App\Http\Controllers\FileUploadController::class, 'fileUp'])->with('messagem', 'Arquivo enviado com sucesso');
        
    }
    
}
