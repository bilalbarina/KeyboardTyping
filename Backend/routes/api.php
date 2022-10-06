<?php

use App\Http\Controllers\API\LeaderboardController;
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


Route::controller(LeaderboardController::class)->group(function() {
    Route::get('/leaderboard', 'leaderboard')->name('score.leaderboard');
    Route::put('/update-score', 'update')->name('score.update');
    Route::post('/create-score', 'create')->name('score.create');
});
