<?php

use App\Http\Controllers\RangkumanController;
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

Route::group(['prefix' => '/materi'], function(){
    Route::post('/post', [RangkumanController::class, 'createRangkuman']);
    Route::get('/kelas', [RangkumanController::class, 'getKelas']);
    Route::get('/mapel', [RangkumanController::class, 'getMapel']);
    Route::get('/rangkuman/{mapel_id}', [RangkumanController::class, 'getRangkuman']);
    Route::get('/detail/rangkuman/{rangkuman}', [RangkumanController::class, 'detail']);
});


