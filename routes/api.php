<?php

<<<<<<< HEAD
=======
use App\Http\Controllers\RankController;
use App\Http\Controllers\QuestionController;
use App\Models\Rank;
>>>>>>> b61b926f6f2f84d63b0fbcdfe73276a2c1eafc48
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
<<<<<<< HEAD
=======
Route::get('/rank',[RankController::class,'show']);
Route::get('/excel',[QuestionController::class,'import']);
Route::get('/ExtractQuestion/{n}', [QuestionController::class,'ExtractQuestion']);
>>>>>>> b61b926f6f2f84d63b0fbcdfe73276a2c1eafc48
