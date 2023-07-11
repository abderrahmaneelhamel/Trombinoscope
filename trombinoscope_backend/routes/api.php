<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum'])->get('/users', function (Request $request) {
    return User::all()->toJson();
});
Route::middleware(['auth:sanctum'])->post('/user/update', [App\Http\Controllers\ProfileController::class, 'update']);

Route::middleware(['auth:sanctum'])->post('/user/create', [App\Http\Controllers\ProfileController::class, 'store']);


Route::middleware(['auth:sanctum'])->post('/page', function (Request $request) {
    return User::where('pole' , $request->pole)->get()->toJson();
});