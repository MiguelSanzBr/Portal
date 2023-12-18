<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\files;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Livewire\WithFileUploads;
use Response;

class FileUploadController extends Controller
{
  use WithFileUploads;
  public $name;
  
    public function fileUp()
    {
      $files=files::all()->last();
      return view('file',['files' => $files]);
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
        }else if($extension == "mp4" ||          $extension == "mov" ||
        $extension == "avi" || 
        $extension == "mkv") 
        {
         $save = $request->image_path->storeAs('/VIDEO',$fileName);
        }else {
          echo "a Extenção do seu arquivo é invalida";
        }
       $path = storage_path($save);    
       
      
         $exists = Storage::disk('local')->exists('IMG/'.$fileName);
         $exists = Storage::disk('local')->exists('VIDEO/'.$fileName);
    
       
       $this->name = $fileName;

       
        $files = files::Create([
         "title" => $request->title,
         "describe" => $request->describe,
         "files_path" => $path,
         "files_name" => $fileName,
         "user_id" => $user
        ]);
      
        
    // return view('file',['name' => $fileName]);
      return redirect()->action([\App\Http\Controllers\FileUploadController::class, 'fileUp']);
        
    }
}
