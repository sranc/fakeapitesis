<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('images', [ImageController::class, 'index']);
Route::get('images/{image}', [ImageController::class, 'show']);
Route::get('images/{image}/imageRight', [ImageController::class, 'imageRight']);
Route::post('images', [ImageController::class, 'store']);
Route::put('images/{image}', [ImageController::class, 'update']);
Route::delete('images/{image}', [ImageController::class, 'delete']);