<?php

use App\Http\Controllers\WeaponController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/list-weapons', [WeaponController::class, 'listWeapon']);
Route::post('/insert-rifle', [WeaponController::class, 'insertWeapon']);
Route::put('/update-rifle/{id}', [WeaponController::class, 'updateWeapon']);
Route::delete('/delete-rifle/{id}', [WeaponController::class, 'deleteWeapon']);
