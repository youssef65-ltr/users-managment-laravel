<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthUser;

Route::get('/welcome/{name?}', function (?string $name = "user") {
    return view("welcome", ["name" => $name]);
})->where("name", "[A-Za-z]+");



// Route::get("/controller/{user_name?}" , [UserController::class , "index"]);
Route::get("", function () {
    return to_route("users.index");
});


Route::view("/delete", "delete");

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
});




// 404 page not found routes :
Route::view("/404", "404");
Route::fallback(function () {
    return redirect("/404");
});


Route::view("/login", "login");