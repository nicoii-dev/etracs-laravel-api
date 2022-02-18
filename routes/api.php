<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndividualController;
use App\Http\Controllers\JuridicalController;

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
Route::get('/individual', [IndividualController::class, 'index']);
Route::get('/individual/{id}', [IndividualController::class, 'show']);
Route::post('/individual', [IndividualController::class, 'store']);
Route::put('/individual/{id}', [IndividualController::class, 'update']);
Route::delete('/individual/{id}', [IndividualController::class, 'destroy']); 
Route::post('/individual/multipledelete', [IndividualController::class, 'multipleDelete']); 

Route::get('/juridical', [JuridicalController::class, 'index']);
Route::get('/juridical/{id}', [JuridicalController::class, 'show']);
Route::post('/juridical', [JuridicalController::class, 'store']);
Route::put('/juridical/{id}', [JuridicalController::class, 'update']);
Route::delete('/juridical/{id}', [JuridicalController::class, 'destroy']); 
