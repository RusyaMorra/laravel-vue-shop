<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ProductsController;
use App\Http\Controllers\Api\v1\ProductsFiltersController;
use App\Http\Controllers\Api\v1\CatsController;
use App\Http\Controllers\Api\v1\CartController;
use App\Http\Controllers\Api\v1\Auth\RegisterController;

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

/*
 *
 */

Route::resource('products', ProductsController::class);

Route::resource('cats', CatsController::class);

Route::post('/auth/register', [RegisterController::class, 'register']);

Route::post('/cart/add', [CartController::class, 'store']);
Route::post('/cart/get', [CartController::class, 'index']);

Route::get('/filter/desc', [ProductsFiltersController::class, 'index']);
