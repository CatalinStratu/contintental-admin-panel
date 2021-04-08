<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect(route('login'));
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post('add-user', [App\Http\Controllers\UserProfileController::class, 'store'])->name('add.staff');
    Route::put('/user/profile/update', [App\Http\Controllers\UserProfileController::class, 'update'])->name('user.profile.update');
    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('reservations', [\App\Http\Controllers\ReservationController::class, 'index'])->name('reservations');
    Route::get('bugs', [\App\Http\Controllers\BugController::class, 'index'])->name('bug');
    Route::post('bugs-report', [\App\Http\Controllers\BugController::class, 'penetration'])->name('bug.report');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('rooms-type', [\App\Http\Controllers\RoomTypeController::class, 'index'])->name('rooms.type');
        Route::post('add-room-type', [\App\Http\Controllers\RoomTypeController::class, 'store'])->name('add.room.type');
        Route::get('rooms', [\App\Http\Controllers\RoomController::class, 'index'])->name('rooms');
        Route::post('add-room', [\App\Http\Controllers\RoomController::class, 'store'])->name('add.room');
        Route::get('room/edit/{id}', [App\Http\Controllers\RoomController::class, 'UpdateGet'])->name('update.room');
        Route::post('room/edit_post/{id}', [App\Http\Controllers\RoomController::class, 'UpdatePost'])->name('update.room.post');
        Route::get('emails', [\App\Http\Controllers\EmailController::class, 'index'])->name('emails');
        Route::post('emails-to-all', [\App\Http\Controllers\EmailController::class, 'subscribeMailSendAll'])->name('ToAllEmails');
        Route::post('add-user', [App\Http\Controllers\UserProfileController::class, 'store'])->name('add.staff');
        Route::get('employees', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
        Route::get('user/edit/{id}', [App\Http\Controllers\EmployeeController::class, 'UpdateGet'])->name('update.staff.get');
        Route::post('user/edit_post/{id}', [App\Http\Controllers\EmployeeController::class, 'UpdatePost'])->name('staffupdate');
    });
});
