<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PainelController;
use Illuminate\Support\Facades\Route;
use App\Livewire\UploadPhoto;
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

Route::get("/", function () {
  return view("welcome");
});

Route::get("/dashboard", function () {
  return view("dashboard");
})
  ->middleware(["auth", "verified"])
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
  route::get("/painelimg", "painelImage")
    ->name("painelimg.get")
    ->middleware("auth");

 route::post("/painelImageEdit", "painelImageEdit")->name("painelEdit.post");
  route::post("/painelImageDelete", "painelImageDelete")->name("painelImageDelete.post");
    
  route::get("/painelvd", "painelVideo")
    ->name("painelvideo.get")
    ->middleware("auth");
});

Route::get("/files", [App\Livewire\UploadPhoto::class, "render"]);
Route::post("/save", [App\Livewire\UploadPhoto::class, "save"]);

require __DIR__ . "/auth.php";
