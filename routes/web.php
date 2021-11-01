<?php

use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [StoreController::class, 'index']);
Route::post('/stores', [StoreController::class, 'store']);
Route::get('{store:base_url}', [StoreController::class, 'show']);
Route::get('{store:base_url}/edit', [StoreController::class, 'edit']);
Route::post('{store:base_url}/update', [StoreController::class, 'update']);
Route::post('{store:base_url}/delete', [StoreController::class, 'destroy']);
