<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// 追加
use App\Http\Controllers\Api\NextjsController;

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

// 追加
Route::get('/nextjs', [NextjsController::class, 'index']);
