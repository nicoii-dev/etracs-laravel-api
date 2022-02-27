<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndividualController;
use App\Http\Controllers\JuridicalController;
use App\Http\Controllers\MultipleController;
use App\Http\Controllers\BarangayController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\AssessmentLevelController;
use App\Http\Controllers\MarketValueController;

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
Route::post('/juridical/multipledelete', [JuridicalController::class, 'multipleDelete']);

Route::get('/multiple', [MultipleController::class, 'index']);
Route::get('/multiple/{id}', [MultipleController::class, 'show']);
Route::post('/multiple', [MultipleController::class, 'store']);
Route::put('/multiple/{id}', [MultipleController::class, 'update']);
Route::delete('/multiple/{id}', [MultipleController::class, 'destroy']);
Route::post('/multiple/multipledelete', [MultipleController::class, 'multipleDelete']);

Route::get('/barangay', [BarangayController::class, 'index']);
Route::get('/barangay/{id}', [BarangayController::class, 'show']);
Route::post('/barangay', [BarangayController::class, 'store']);
Route::put('/barangay/{id}', [BarangayController::class, 'update']);
Route::delete('/barangay/{id}', [BarangayController::class, 'destroy']);

Route::get('/municipality', [MunicipalityController::class, 'index']);
Route::get('/municipality/{id}', [MunicipalityController::class, 'show']);
Route::post('/municipality', [MunicipalityController::class, 'store']);
Route::put('/municipality/{id}', [MunicipalityController::class, 'update']);
Route::delete('/municipality/{id}', [MunicipalityController::class, 'destroy']);

Route::get('/assessment-levels', [AssessmentLevelController::class, 'index']);
Route::get('/assessment-levels/{id}', [AssessmentLevelController::class, 'show']);
Route::post('/assessment-levels', [AssessmentLevelController::class, 'store']);
Route::put('/assessment-levels/{id}', [AssessmentLevelController::class, 'update']);
Route::delete('/assessment-levels/{id}', [AssessmentLevelController::class, 'destroy']);

Route::get('/market-value/{id}', [MarketValueController::class, 'show']);
Route::post('/market-value', [MarketValueController::class, 'store']);
Route::put('/market-value/{id}', [MarketValueController::class, 'update']);
Route::post('/market-value/{id}', [MarketValueController::class, 'destroy']);
