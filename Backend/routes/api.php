<?php

use App\Http\Controllers\API\ScoreController;
use App\Models\Score;
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


Route::controller(ScoreController::class)->group(function() {
    Route::post('/create-score', 'create')->name('score.create');
    Route::post('/update-score', 'update')->name('score.update');
});
