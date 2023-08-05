<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

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


Route::get('productos',[productController::class, 'getProduct']);

Route::get('productos/{id}',[productController::class, 'show']);

Route::post('addProduct',[productController::class, 'insert']);

Route::put('update/{id}',[productController::class, 'update']);

Route::delete('delete/{id}',[productController::class, 'delete']);

Route::post('product', [productController::class, 'insert'])->name('product.insert');
Route::get('product', [productController::class, 'products'])->name('product.products');


