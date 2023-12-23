<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\images;
use App\Models\videos;
use App\Models\User;
use File;

class PainelController extends Controller
{
  public function painel(Request $request){
   $userChoice = $request->input('site_choice');

 if ($userChoice === 'Painel Imagem') {
       return redirect()->route('painelimg.get');
    } elseif ($userChoice === 'Painel Video') {
     return redirect()->route('painelvideo.get');
    } elseif ($userChoice === 'Promover Admin') {
      return redirect()->route('paineluser.get');
    }
   
  
    return view('painel',['userChoice' => $userChoice]);
  }
  
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
           die();
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
           die();
         }
         
       }
    public function painelvideo(){
     $video=videos::all();
      return view('painelVideo',['vd'=>$video]);
    }
    public function painelVideoEdit(Request $r){
         $id = $r->id;
         $images = videos::find($id);
         $images->adminCheck = 1;
         $images->save(); 
         if($images->adminCheck == 1){
           return redirect()->route('painelvideo.get')->with('mensagem', 'Arquivo aprovado com sucesso');
         }else{
           die();
         }
       }
     public function painelVideoDelete(Request $r){
         $id = $r->id;
         $images = videos::find($id);
         $fn = $images->files_name;
         $file=File::delete('storage/VIDEO/'.$fn);
         $images->delete();
      if($file){
         return redirect()->route('painelvideo.get')->with('mensagem', 'Arquivo apagado com sucesso');
      }else{
        die();
      }
       }
       public function dashboard(){
         $image=images::where('adminCheck', 1)->get();
         $videos=videos::where('adminCheck', 1)->get();
         
         return view('dashboard',['image' => $image,'video'=>$videos]);
       }
       
       public function painelUser(){
     $usr=User::all();
      return view('paineluser',['user'=>$usr]);
    }
    public function painelUserEdit(Request $r){
         $id = $r->id;
         $usr = User::find($id);
         $usr->admin = 1;
         $usr->save(); 
         if($usr->admin == 1){
           return redirect()->route('paineluser.get')->with('mensagem', 'Novo Adm Na Area');
         }else {
        die();
    }
         
       }
       public function painelUserDelete(Request $r){
         $id = $r->id;
         $usr = User::find($id);
         $usr->admin = 0;
         $usr->save(); 
         if($usr->admin == 0){
           return redirect()->route('paineluser.get')->with('mensagem', 'Adm foi Rebaixado');
         }else {
        die();
    }
       }
}
