<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthUser;



// Route::get("/controller/{user_name?}" , [UserController::class , "index"]);
Route::get("", function () {
    return to_route("users.index");
});



Route::name("users.")
    ->prefix("users")
    ->middleware("App\Http\Middleware\AuthUser")
    ->group(function () {
        Route::get("", [UserController::class, "index"])->name("index");
        Route::get("/create", [UserController::class, "create"])->name("create");
        Route::post("", [UserController::class, "store"])->name("store");
        Route::get("/{id}", [UserController::class, "show"])->name("show");
        Route::get("/{id}/edit", [UserController::class, "edit"])->name("edit");
        Route::put("/{id}", [UserController::class, "update"])->name("update");
        Route::delete("/{id}" , [UserController::class , "destroy"])->name("destroy");
    });

Route::get("/login" , [UserController::class , "login"] )->name("login");
Route::post("/submitLogin" , [UserController::class , "submitLogin"])->name("submitLogin");
Route::get("/logout" , [UserController::class , "logout"])->name("logout");


// 404 page not found routes :
Route::view("/404", "404");
Route::fallback(function () {
    return redirect("/404"); 
});


