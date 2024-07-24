<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    [ListingController::class, 'index']
);

Route::get('/listings/create', [ListingController::class, 'create']);
Route::post('/listings', [ListingController::class, 'store']);
Route::get(
    '/listings/{id}',
    [ListingController::class, 'show']
);

Route::get('/listings/{id}/edit', [ListingController::class,'edit']);
Route::put('/listings/{id}', [ListingController::class,'update']);
Route::delete('/listings/{id}', [ListingController::class,'destroy']);


Route::get('/register',[UserController::class,'create']);
Route::post('/users/register', [UserController::class,'store']);
Route::get('/login', [UserController::class,'login']);
Route::post('/users/login', [UserController::class,'authenticate']);
Route::post('/logout', [UserController::class,'logout']);
