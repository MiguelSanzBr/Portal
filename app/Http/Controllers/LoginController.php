<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class LoginController extends Controller
{
    private $nome ;
    private $email;
    private $hashs;
    private $remember_token;
    public function __construct()
    {
   // $this->middleware('auth')->except(["register"]);
 
    }
    public function login(Request $request){
     return view('login');
      }
  public function logs (Request $request){
  $email = $request->input('email');
  $password = $request->input('password');
    $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:1',
        ]);
if (Auth::attempt($credentials)) {
 echo "usuario autenticado";
         $user = Auth::check();
         $id = Auth::id();
       return redirect()->intended("/fileUp");
        }else{
          echo "usuario não autenticado";
        }
 
    }
    public function register(Request $request){ 
      return view('register');
    }
    public function filter(Request $request){
    $credentials = $request->validate([
            'name' => ['required','max:25'],
            'email' => ['required', 'email'],
           'password' => 'min:1|required_with:password_confirmation|same:password_confirmation',
           'password_confirmation' => 'min:1']);
    $this->nome = $request->input('name');
    $this->email = $request->input('email');
    $senha = $request->input('password');
    $this->hashs = bcrypt($senha);
    
    $token = $request->input('_token');
      
       $login = User::Create([
          "name" => $this->nome,
          "email" => $this->email,
          "password" => $this->hashs,
          "remember_token" => $token
        ]);
        return redirect()->intended("login");
    }
}