<?php

use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\RewardsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BudayaController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SafetyController;
use App\Http\Controllers\KinerjaBulController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\EmailVerificationController;


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

Route::get('/login', [UserController::class, 'loginView'])->name('loginView');
Route::post('/login/func', [UserController::class, 'login'])->name('login');
Route::get('/kinerja/view/{id}', [KinerjaBulController::class, 'kinerja'])->name('kinerja');


// Show email verification notice
Route::get('/email/verify/notice', [EmailVerificationController::class, 'showNotice'])->name('verification.notice');

// Email verification confirmation
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');

// Resend email verification link
Route::post('/email/verify/resend', [EmailVerificationController::class, 'resend'])->middleware(['auth'])->name('verification.send');


Route::group(['middleware' => 'admin'],function () {
    // Routes that require authentication go here
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/profile/', [UserController::class, 'profile'])->name('profile');
    
    Route::get('/notification', [NotificationController::class, 'index'])->name('notification');
    Route::post('/notification/send', [NotificationController::class, 'send'])->name('sendNotif');
    
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
    Route::get('/feedback/preview/{id}', [FeedbackController::class, 'previewFeedback'])->name('previewFeedback');
    Route::get('/feedback/delete/{id}',[FeedbackController::class, 'deleteFeedback'])->name("deleteFeedback");
    
    Route::post('/materi/store', [MateriController::class, 'store'])->name('materi.store');
    Route::get('/materi', [MateriController::class, 'index'])->name('materi');
    Route::get('/materi/delete/{idMateri}',[MateriController::class, 'deleteMateri'])->name("deleteMateri");
    Route::get('/materi/download/{idMateri}', [MateriController::class, 'downloadMateri'])->name('downloadMateri');
    Route::post('/materi/edit/{idMateri}', [MateriController::class, 'editMateri'])->name('editMateri');
    
    Route::get('/budaya',[BudayaController::class, 'index'])->name("budayaIndex");
    Route::get('/budaya/add',[BudayaController::class, 'addBudaya'])->name("addBudaya");
    Route::post('/budaya/new', [BudayaController::class, 'newBudaya'])->name('newBudaya');
    Route::get('/budaya/delete/{idBudaya}',[BudayaController::class, 'deleteBudaya'])->name("deleteBudaya");
    Route::get('/budaya/edit/{idBudaya}', [BudayaController::class, 'editBudaya'])->name('editBudaya');
    Route::post('/budaya/update/{idBudaya}', [BudayaController::class, 'updateBudaya'])->name('updateBudaya');
    
    Route::get('/manage',[UserController::class, 'manage'])->name("manageUser");
    Route::post('/manage/edit/{idUser}', [UserController::class, 'editUser'])->name('editUser');
    Route::post('/manage/tambah', [UserController::class, 'tambahUser'])->name('tambahUser');
    Route::post('/manage/ubahA/{idUser}', [UserController::class, 'ubahAdmin'])->name('ubahAdmin');
    Route::post('/manage/ubahU/{idUser}', [UserController::class, 'ubahUser'])->name('ubahUser');
    Route::get('/manage/delete/{idUser}',[UserController::class, 'hapusUser'])->name("hapusUser");

    Route::get('/reward',[RewardsController::class, 'index'])->name("rewardUser");
    Route::post('/reward/add/{uid}/{pid}',[RewardsController::class, 'addReward'])->name("addReward");
    Route::post('/reward/edit/{uid}/{pid}',[RewardsController::class, 'editReward'])->name("editReward");
    Route::post('/periode/add/',[RewardsController::class, 'addPeriode'])->name("addPeriode");
    Route::get('/reward/delete/{uid}/{pid}',[RewardsController::class, 'deleteReward'])->name("deleteReward");
    
    Route::get('/safety', [SafetyController::class, 'index'])->name('safety');
    Route::post('/safety/add', [SafetyController::class, 'addSafety'])->name('addSafety');
    Route::get('/safety/preview/{id}', [SafetyController::class, 'previewSafety'])->name('previewSafety');
    Route::get('/safety/delete/{id}',[SafetyController::class, 'deleteSafety'])->name("deleteSafety");
    Route::post('/safety/update/{id}', [SafetyController::class, 'updateSafety'])->name('updateSafety');
    
    Route::get('/kinerja',[KinerjaBulController::class, 'kinerjaBulanan'])->name("kinerjaBulan");
    Route::post('/kinerja/add',[KinerjaBulController::class, 'addKinerja'])->name("addKinerja");
    Route::post('/kinerja/edit/{id}',[KinerjaBulController::class, 'editKinerja'])->name("editKinerja");
    Route::get('/kinerja/delete/{id}',[KinerjaBulController::class, 'deleteKinerja'])->name("deleteKinerja");

    Route::get('/aktivitas',[AktivitasController::class, 'index'])->name("indexAktivitas");
    Route::get('/aktivitas/{idBudaya}',[AktivitasController::class, 'aktivitas'])->name("aktivitas");
    
    Route::get('/budaya/{idBudaya}/aktivitas/add',[AktivitasController::class, 'addAktivitas'])->name("addAktivitas");
    Route::post('/aktivitas/new', [AktivitasController::class, 'newAktivitas'])->name('newAktivitas');
    Route::get('/aktivitas/delete/{idAktivitas}', [AktivitasController::class, 'deleteAktivitas'])->name('deleteAktivitas');
    Route::post('/aktivitas/edit/{idAktivitas}', [AktivitasController::class, 'editAktivitas'])->name('editAktivitas');

    Route::get('/internalisasi',[UserController::class, 'internalisasi'])->name("internalisasi");
    Route::get('/internalisasi/add/{id}',[UserController::class, 'addTimInternal'])->name("addTimInternal");
    Route::get('/internalisasi/delete/{id}',[UserController::class, 'deleteTimInternal'])->name("deleteTimInternal");

    Route::get('/aboutUs',[UserController::class, 'aboutUs'])->name("aboutUs");
    
    // Add more authenticated routes here
});

Route::get('/password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');



