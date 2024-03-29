<?php

use App\Http\Controllers\EmailVerificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::post('/register', [ApiController::class, 'register']);
Route::post('/login', [ApiController::class, 'login']);
Route::post('/user/{idUser}/edit', [ApiController::class, 'editUser']);
Route::get('/user/get/{uid}',[ApiController::class, 'getUser']);

Route::post('/feedback/new', [ApiController::class, 'newFeedback']);

Route::get('/budaya/all', [ApiController::class, 'budayaAll']);
Route::get('/budaya/now', [ApiController::class, 'getBudayaNow']);
Route::get('/budaya/year/now', [ApiController::class, 'getBudayaYearNow']);

Route::get('/aktivitas/{idBudaya}',[ApiController::class, 'aktivitasBudaya']);

Route::get('/safety',[ApiController::class, 'safetyMoment']);

Route::get('/visit/{id}/increment',[ApiController::class, 'incrementVisit']);

Route::get('/timInternalisasi',[ApiController::class, 'getTimInternal']);

Route::get('/reward/latest',[ApiController::class, 'getLatestReward']);
Route::get('/reward',[ApiController::class,'getRewards']);

Route::get('/materi',[ApiController::class,'getMateri']);

Route::get('/kinerja',[ApiController::class,'getKinerja']);

Route::get('/email/verify/resend/{uid}', [EmailVerificationController::class, 'resend']);







