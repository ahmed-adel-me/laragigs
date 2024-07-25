<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    [ListingController::class, 'index']
);

Route::get('/listings/create', [ListingController::class, 'create'])->middleware(Authenticate::class);
Route::post('/listings', [ListingController::class, 'store'])->middleware(Authenticate::class);
Route::get(
    '/listings/{id}',
    [ListingController::class, 'show']
);

Route::get('/listings/{id}/edit', [ListingController::class, 'edit'])->middleware(Authenticate::class);
Route::put('/listings/{id}', [ListingController::class, 'update'])->middleware(Authenticate::class);
Route::delete('/listings/{id}', [ListingController::class, 'destroy'])->middleware(Authenticate::class);


Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users/register', [UserController::class, 'store']);
Route::get('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/users/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout'])->middleware(Authenticate::class);
