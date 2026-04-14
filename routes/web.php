<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome/{name?}', function (?string $name = "user") {
    return view("welcome", ["name" => $name]);
})->where("name", "[A-Za-z]+");



// Route::get("/controller/{user_name?}" , [UserController::class , "index"]);
Route::get("" , function() {
    return to_route("users.index");
});


Route::view("/delete" , "delete");
Route::view("/update" , "update");

Route::get("/users" , [UserController::class , "index"])->name("users.index");
Route::get("/users/create" , [UserController::class , "create"])->name("users.create");
Route::post("/users" , [UserController::class , "store"])->name("users.store");
// Route::get("/users" , [UserController::class , "index"]);
