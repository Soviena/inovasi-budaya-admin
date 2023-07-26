<?php

use App\Http\Controllers\AktivitasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BudayaController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SafetyController;
use App\Http\Controllers\KinerjaBulController;
use App\Http\Controllers\MateriController;
use App\Models\Budaya;
use App\Models\Feedback;
use App\Models\Materi;

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
Route::get('/feedback/preview/{id}', [FeedbackController::class, 'previewFeedback'])->name('previewFeedback');
Route::get('/feedback/delete/{id}',[FeedbackController::class, 'deleteFeedback'])->name("deleteFeedback");

Route::post('/materi/store', [MateriController::class, 'store'])->name('materi.store');
Route::get('/materi', [MateriController::class, 'index'])->name('materi');
Route::get('/materi/delete/{idMateri}',[MateriController::class, 'deleteMateri'])->name("deleteMateri");
Route::get('/materi/download/{idMateri}', [MateriController::class, 'downloadMateri'])->name('downloadMateri');
Route::get('/materi/edit/{idMateri}', [MateriController::class, 'editMateri'])->name('editMateri');
Route::post('/materi/update/{idMateri}', [MateriController::class, 'updateMateri'])->name('updateMateri');

Route::get('/budaya',[BudayaController::class, 'index'])->name("budayaIndex");
Route::get('/budaya/add',[BudayaController::class, 'addBudaya'])->name("addBudaya");
Route::post('/budaya/new', [BudayaController::class, 'newBudaya'])->name('newBudaya');
Route::get('/budaya/delete/{idBudaya}',[BudayaController::class, 'deleteBudaya'])->name("deleteBudaya");
Route::get('/budaya/edit/{idBudaya}', [BudayaController::class, 'editBudaya'])->name('editBudaya');
Route::post('/budaya/update/{idBudaya}', [BudayaController::class, 'updateBudaya'])->name('updateBudaya');

Route::get('/manage',[UserController::class, 'manage'])->name("manageUser");

Route::get('/reward',[UserController::class, 'reward'])->name("rewardUser");

Route::get('/safety', [SafetyController::class, 'index'])->name('safety');
Route::post('/safety/add', [SafetyController::class, 'addSafety'])->name('addSafety');
Route::get('/safety/preview/{id}', [SafetyController::class, 'previewSafety'])->name('previewSafety');
Route::get('/safety/delete/{id}',[SafetyController::class, 'deleteSafety'])->name("deleteSafety");
Route::get('/safety/edit/{id}', [SafetyController::class, 'editSafety'])->name('editSafety');
Route::post('/safety/update/{id}', [SafetyController::class, 'updateSafety'])->name('updateSafety');

Route::get('/kinerjaBulanan',[KinerjaBulController::class, 'kinerjaBulanan'])->name("kinerjaBulan");

Route::get('/aktivitas',[AktivitasController::class, 'index'])->name("indexAktivitas");
Route::get('/aktivitas/{idBudaya}',[AktivitasController::class, 'aktivitas'])->name("aktivitas");

Route::get('/budaya/{idBudaya}/aktivitas/add',[AktivitasController::class, 'addAktivitas'])->name("addAktivitas");
Route::post('/aktivitas/new', [AktivitasController::class, 'newAktivitas'])->name('newAktivitas');
Route::get('/aktivitas/delete/{idAktivitas}', [AktivitasController::class, 'deleteAktivitas'])->name('deleteAktivitas');
Route::post('/aktivitas/edit/{idAktivitas}', [AktivitasController::class, 'editAktivitas'])->name('editAktivitas');





