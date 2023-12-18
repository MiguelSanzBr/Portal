<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileUploadController;
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

Route::get("/files", [App\Livewire\UploadPhoto::class, "render"]);
Route::post("/save", [App\Livewire\UploadPhoto::class, "save"]);

require __DIR__ . "/auth.php";
