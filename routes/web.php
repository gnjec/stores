<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseController;

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
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/product/{path}', [ProductController::class, 'show']);
Route::get('/product/{path}/edit', [ProductController::class, 'edit']);
Route::post('/product/{path}/update', [ProductController::class, 'update']);
Route::post('/product/{path}/delete', [ProductController::class, 'destroy']);

Route::get('{store:base_url}', [StoreController::class, 'show']);
Route::get('{store:base_url}/edit', [StoreController::class, 'edit']);
Route::post('{store:base_url}/update', [StoreController::class, 'update']);
Route::post('{store:base_url}/delete', [StoreController::class, 'destroy']);

Route::get('{store:base_url}/{path}', [WarehouseController::class, 'show']);
Route::post('{store:base_url}/{path}/remove', [WarehouseController::class, 'remove']);


