<?php

use App\Http\Controllers\RankController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RecordController;
use App\Models\Rank;
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
Route::get('/excel',[QuestionController::class,'import']);
Route::get('/ExtractQuestion/{n}', [QuestionController::class,'ExtractQuestion']);
Route::post('/getUserById',[RankController::class,'getUserById']);
Route::post('/record',[RankController::class,'Record']);
Route::get('/login/{code}',[RankController::class,'login']);
Route::get('/login2/{code}',[RankController::class,'login2']);
Route::get('/getRank',[RankController::class,'getRank']);
Route::get('/uIsE/{id}',[RankController::class,'uIsE']);
Route::get('/answer/record/{openid}',[RecordController::class,'record']);
Route::get('/answer/getAnswered/{openid}/{count}',[RecordController::class,'getAnswered']);
