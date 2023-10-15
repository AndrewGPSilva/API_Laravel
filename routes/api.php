<?php

use App\Http\Controllers\LivroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("livros/orderbynome", [LivroController::class, 'orderbynome']);
Route::get("livros/orderbycategoria", [LivroController::class, 'orderbycategoria']);
Route::get("livros/orderbyautor", [LivroController::class, 'orderbyautor']);
Route::get("/livros", [LivroController::class, 'index']);
Route::post("/livros", [LivroController::class, 'create']);
Route::get("/livros/{id}", [LivroController::class, 'show']);
Route::delete("/livros/{id}", [LivroController::class, 'destroy']);
Route::put("/livros/{id}", [LivroController::class, 'update']);
