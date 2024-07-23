<?php

use App\Http\Controllers\ListingController;
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
