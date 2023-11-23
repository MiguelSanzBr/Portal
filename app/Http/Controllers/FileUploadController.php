<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;

class FileUploadController extends Controller
{
    public function fileUp()
    {
      return view('file');
    }
    public function load(Request $request)
    {
$request->validate([
            'title' => 'required|max:255',
            'describe' => 'required|max:700',
            'image_path' => 'mimes:jpeg,png,jpg,gif,svg,mp4,mov,avi,mkv'
        ]);
            //'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        $user = Auth::id();
        $file = $request->file('image_path');
        
            if($request->hasFile('image_path'))
            {
           $imageNameComplet = $file->getClientOriginalName();
          $extension = $request->image_path->extension();
          $imageName = basename($file->getClientOriginalName(), '.' . $extension);
          $fileName = time() . '.' . $request->image_path->extension();
            }
            
    if($extension == "jpeg" ||          $extension == "png" ||
        $extension == "jpg" ||
        $extension == "gif" ||
        $extension == "svg" ) {
        $save = $request->image_path->storeAs('/IMG',$fileName);
        }else {
          $save = $request->image_path->storeAs('/VIDEO',$fileName);
        }
         $path = storage_path($save);

       /* 
        $video = video::Create([
         "title" => $request->title,
         "describe" => $request->describe,
         "image_path" => $path,
         "user_id" => $user
        ]);
        */
       
   dd($save);
      
    }
}
