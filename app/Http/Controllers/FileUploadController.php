<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Livewire\WithFileUploads;

class FileUploadController extends Controller
{
  use WithFileUploads;
  public $path; 
  public $name;
  
    public function fileUp()
    {
      return view('file',['name' => $this->name,'path' => $this->path]);
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
       $this->path = $path;  
       $this->name = $imageName;
       
       /* 
        $video = video::Create([
         "title" => $request->title,
         "describe" => $request->describe,
         "image_path" => $this->path,
         "user_id" => $user
        ]);
        */
        return redirect()->action([\App\Http\Controllers\FileUploadController::class, 'fileUp']);
        
    }
}
