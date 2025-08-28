<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/test',function($name){
    return view('test',["user_name"=>$name]);
});

//USERS ROUTES

Route::get('/user',[UserController::class,'index'])->name("userpage");
Route::get('/user/{id}',[UserController::class,'show']);
Route::get('/user-with-name/{name}',[UserController::class,'showWithName']);
Route::post('/user',[UserController::class,'store']);
Route::put('/user',[UserController::class,'index']);
Route::delete('/user/{id}',[UserController::class,'destroy']);


//TASKS ROUETS
Route::get("/task",[TaskController::class,"index"]);
Route::post("/task",[TaskController::class,"store"])->name("task.store");
Route::get("/task/create",[TaskController::class,"create"])->name("task.create");
Route::delete("/task/{id}",[TaskController::class,"destroy"]);


//cart Routes
Route::get("/cart",[CartController::class,"index"]);
Route::post("/cart/add/{id}",[CartController::class,"add"]);
Route::post("/cart/remove/{id}",[CartController::class,"remove"]);
Route::post("/cart/update/{id}",[CartController::class,"update"]);


//Products Routes

Route::get("/product",[ProductController::class,"index"]);

