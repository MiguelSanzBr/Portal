<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\images;
use App\Models\videos;
use File;

class PainelController extends Controller
{
   public function painelImage(){
     $image=images::all();
      return view('painelImage',['img'=>$image]);
    }
       public function painelImageEdit(Request $r){
         $id = $r->id;
         $images = images::find($id);
         $images->adminCheck = 1;
         $images->save(); 
         if ($images->adminCheck == 1){
           return redirect()->action([\App\Http\Controllers\PainelController::class, 'painelImage'])->with('mensagem', 'Arquivo aprovado com sucesso');
         }else {
           echo "deu erro";
         }
         
       }
     public function painelImageDelete(Request $r){
         $id = $r->id;
         $images = images::find($id);
         $fn = $images->files_name;
         $file=File::delete('storage/IMG/'.$fn);
         $images->delete();
       if ($file){
         return redirect()->action([\App\Http\Controllers\PainelController::class, 'painelImage'])->with('mensagem', 'Arquivo apagado com sucesso');
         }else {
           echo "deu erro";
         }
         
       }
    public function painelvideo(){
     $video=videos::all();
      return view('painelVideo',['vd'=>$video]);
    }
}
