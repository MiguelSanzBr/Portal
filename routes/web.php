<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PainelController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/dashboard", [App\Http\Controllers\PainelController::class,"dashboard"])
  ->name("dashboard");

Route::get("/", [App\Http\Controllers\PainelController::class,"dashboard"])
  ->name("dashboard");

Route::middleware("auth")->group(function () {
  Route::get("/profile", [ProfileController::class, "edit"])->name(
    "profile.edit"
  );
  Route::patch("/profile", [ProfileController::class, "update"])->name(
    "profile.update"
  );
  Route::delete("/profile", [ProfileController::class, "destroy"])->name(
    "profile.destroy"
  );
});

Route::controller(FileUploadController::class)->group(function () {
  route::get("/fileUp", "fileUp")
    ->name("fileUp.get")
    ->middleware("auth");
  Route::post("/load", "load")->name("load.post");
  
});

Route::controller(PainelController::class)->group(function () {
  route::get("/painel", "painel")
    ->name("painel.get")->middleware(["auth", "can:editDelete-files"]);
  
  route::get("/painelimg", "painelImage")
    ->name("painelimg.get")
   ->middleware(["auth", "can:editDelete-files"]);

 route::post("/painelImageEdit", "painelImageEdit")->name("painelImageEdit.post");
  route::post("/painelImageDelete", "painelImageDelete")->name("painelImageDelete.post");
    
  route::get("/painelvd", "painelVideo")
    ->name("painelvideo.get")
   ->middleware(["auth", "can:editDelete-files"]);
    
 route::post("/painelVideoEdit", "painelVideoEdit")->name("painelVideoEdit.post");
  route::post("/painelVideoDelete", "painelVideoDelete")->name("painelVideoDelete.post");
  
  route::get("/painelusr", "painelUser")
    ->name("paineluser.get")
   ->middleware(["auth", "can:editDelete-files"]);
    
 route::post("/painelUserEdit", "painelUserEdit")->name("painelUserEdit.post");
 
 route::post("/painelUserDelete", "painelUserDelete")->name("painelUserDelete.post");
  
});

require __DIR__ . "/auth.php";
