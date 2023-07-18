<?php

use App\Http\Controllers\AktivitasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BudayaController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SafetyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/csv', [UserController::class, 'csv'])->name('csv');

Route::get('/notification', [NotificationController::class, 'index'])->name('notification');
Route::post('/notification/send', [NotificationController::class, 'send'])->name('sendNotif');

Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');

Route::get('/budaya',[BudayaController::class, 'index'])->name("budayaIndex");
Route::get('/budaya/add',[BudayaController::class, 'addBudaya'])->name("addBudaya");
Route::post('/budaya/new', [BudayaController::class, 'newBudaya'])->name('newBudaya');
Route::get('/budaya/delete/{idBudaya}',[BudayaController::class, 'deleteBudaya'])->name("deleteBudaya");

Route::get('/manage',[UserController::class, 'manage'])->name("manageUser");

Route::get('/reward',[UserController::class, 'reward'])->name("rewardUser");

Route::get('/safety',[SafetyController::class, 'safety'])->name("safetyMoment");

Route::get('/aktivitas',[AktivitasController::class, 'index'])->name("indexAktivitas");
Route::get('/aktivitas/{idBudaya}',[AktivitasController::class, 'aktivitas'])->name("aktivitas");

Route::get('/budaya/{idBudaya}/aktivitas/add',[AktivitasController::class, 'addAktivitas'])->name("addAktivitas");
Route::post('/aktivitas/new', [AktivitasController::class, 'newAktivitas'])->name('newAktivitas');
Route::get('/aktivitas/delete/{idAktivitas}', [AktivitasController::class, 'deleteAktivitas'])->name('deleteAktivitas');





