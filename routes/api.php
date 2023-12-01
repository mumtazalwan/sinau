<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth:sanctum')->get('/', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/register', [AuthenticationController::class, 'create_account']);
Route::post('/google/register', [AuthenticationController::class, 'google_auth']);

Route::group(['prefix' => '/materi', 'middleware' => ['auth:sanctum']], function(){
    Route::post('/post', [RangkumanController::class, 'upload_summary']);
    Route::get('/kelas', [RangkumanController::class, 'get_class']);
    Route::get('/mapel', [RangkumanController::class, 'get_subject']);
    Route::get('/rangkuman/{mapel_id}', [RangkumanController::class, 'get_summary']);
    Route::get('/detail/rangkuman/{rangkuman}', [RangkumanController::class, 'detail']);
});

Route::group(['prefix' => '/profile', 'middleware' => ['auth:sanctum']], function (){
    Route::get('/', [ProfileController::class, 'get_data'] );
    Route::post('/edit', [ProfileController::class, 'edit']);
});


