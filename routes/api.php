<?php

use App\Http\Controllers\CareController;
use App\Http\Controllers\MonitoringScheduleController;
use App\Http\Controllers\PhieuKeHoachDieuTriController;
use App\Http\Controllers\PhieuKeHoachDieuTriDetailController;
use App\Http\Controllers\PhieuKhaiThacTienSuDiUngController;
use App\Http\Controllers\PhieuTruyenDichController;
use App\Http\Controllers\PhieuTruyenDichDetailController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'care'], function () {
    Route::get('/all', [CareController::class, 'index']);
    Route::post('/create', [CareController::class, 'store']);
    Route::get('/show/{id}', [CareController::class, 'show']);
    Route::post('/update/{id}', [CareController::class, 'update']);
    Route::post('/destroy/{id}', [CareController::class, 'destroy']);
});

Route::group(['prefix' => 'monitoringSchedule'], function () {
    Route::get('/all', [MonitoringScheduleController::class, 'index']);
    Route::post('/create', [MonitoringScheduleController::class, 'store']);
    Route::get('/show/{id}', [MonitoringScheduleController::class, 'show']);
    Route::post('/update/{id}', [MonitoringScheduleController::class, 'update']);
    Route::post('/destroy/{id}', [MonitoringScheduleController::class, 'destroy']);
});

Route::group(['prefix' => 'phieuTruyenDich'], function () {
    Route::get('/all', [PhieuTruyenDichController::class, 'index']);
    Route::post('/create', [PhieuTruyenDichController::class, 'store']);
    Route::get('/show/{id}', [PhieuTruyenDichController::class, 'show']);
    Route::post('/update/{id}', [PhieuTruyenDichController::class, 'update']);
    Route::post('/destroy/{id}', [PhieuTruyenDichController::class, 'destroy']);
});

Route::group(['prefix' => 'phieuTruyenDichDetail'], function () {
    Route::get('/all', [PhieuTruyenDichDetailController::class, 'index']);
    Route::post('/create', [PhieuTruyenDichDetailController::class, 'store']);
    Route::get('/show/{id}', [PhieuTruyenDichDetailController::class, 'show']);
    Route::post('/update/{id}', [PhieuTruyenDichDetailController::class, 'update']);
    Route::post('/destroy/{id}', [PhieuTruyenDichDetailController::class, 'destroy']);
});

Route::group(['prefix' => 'phieuKeHoachDieuTri'], function () {
    Route::get('/all', [PhieuKeHoachDieuTriController::class, 'index']);
    Route::post('/create', [PhieuKeHoachDieuTriController::class, 'store']);
    Route::get('/show/{id}', [PhieuKeHoachDieuTriController::class, 'show']);
    Route::post('/update/{id}', [PhieuKeHoachDieuTriController::class, 'update']);
    Route::post('/destroy/{id}', [PhieuKeHoachDieuTriController::class, 'destroy']);
});

Route::group(['prefix' => 'phieuKeHoachDieuTriDetail'], function () {
    Route::get('/all', [PhieuKeHoachDieuTriDetailController::class, 'index']);
    Route::post('/create', [PhieuKeHoachDieuTriDetailController::class, 'store']);
    Route::get('/show/{id}', [PhieuKeHoachDieuTriDetailController::class, 'show']);
    Route::post('/update/{id}', [PhieuKeHoachDieuTriDetailController::class, 'update']);
    Route::post('/destroy/{id}', [PhieuKeHoachDieuTriDetailController::class, 'destroy']);
});

Route::group(['prefix' => 'phieuKhaiThacTienSuDiUng'], function () {
    Route::get('/all', [PhieuKhaiThacTienSuDiUngController::class, 'index']);
    Route::post('/create', [PhieuKhaiThacTienSuDiUngController::class, 'store']);
    Route::get('/show/{id}', [PhieuKhaiThacTienSuDiUngController::class, 'show']);
    Route::post('/update/{id}', [PhieuKhaiThacTienSuDiUngController::class, 'update']);
    Route::post('/destroy/{id}', [PhieuKhaiThacTienSuDiUngController::class, 'destroy']);
});