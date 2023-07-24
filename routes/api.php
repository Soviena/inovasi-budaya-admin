<?php

use Illuminate\Http\Request;
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
Route::post('/feedback/new', [ApiController::class, 'feedback']);
Route::get('/budaya/all', [ApiController::class, 'budayaAll']);
Route::get('/aktivitas/{idBudaya}',[ApiController::class, 'aktivitasBudaya']);


