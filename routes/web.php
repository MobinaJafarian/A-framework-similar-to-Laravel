<?php
use Core\Router\Web\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/create_user', [UserController::class, 'create']);
Route::get('/store_user', [UserController::class, 'store']);
Route::get('/edit_user/{id}', [UserController::class, 'edit']);
Route::get('/update_user/{id}', [UserController::class, 'update']);
Route::get('/destroy_user/{id}', [UserController::class, 'delete']);