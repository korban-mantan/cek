<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PollController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/poll', [PollController::class, 'index']);

// Route::post('/poll', [PollController::class, 'store']);

// Route::put('/poll/{id}', [PollController::class, 'update']);

// Route::get('/poll/{id}', [PollController::class, 'show']);

// Route::delete('/poll/{id}', [PollController::class, 'destroy']);

Route::resource('/poll', PollController::class)->except(['create', 'edit']);
