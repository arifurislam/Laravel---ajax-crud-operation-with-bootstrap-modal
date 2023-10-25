<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/fetch-contacts', [ContactController::class, 'fetchContact']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/contacts/{id}', [ContactController::class, 'show']);
Route::post('/contacts-store', [ContactController::class, 'store']);
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit']);
Route::post('/contacts/update/{id}', [ContactController::class, 'update']);
Route::post('/contacts/delete/{id}', [ContactController::class, 'delete']);
