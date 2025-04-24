<?php

use App\Http\Controllers\PhieuChamSocController;
use App\Http\Controllers\PhieuChamSocDetailController;
use App\Http\Controllers\PhieuKeHoachDieuTriController;
use App\Http\Controllers\PhieuKeHoachDieuTriDetailController;
use App\Http\Controllers\PhieuKhaiThacTienSuDiUngController;
use App\Http\Controllers\PhieuKhaiThacTienSuDiUngDetailController;
use App\Http\Controllers\PhieuTruyenDichController;
use App\Http\Controllers\PhieuTruyenDichDetailController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'phieuChamSoc'], function () {
    Route::get('/all', [PhieuChamSocController::class, 'index']);
    Route::post('/create', [PhieuChamSocController::class, 'store']);
    Route::get('/show/{id}', [PhieuChamSocController::class, 'show']);
    Route::post('/update/{id}', [PhieuChamSocController::class, 'update']);
    Route::post('/destroy/{id}', [PhieuChamSocController::class, 'destroy']);
});

Route::group(['prefix' => 'phieuChamSocDetail'], function () {
    Route::get('/all', [PhieuChamSocDetailController::class, 'index']);
    Route::post('/create', [PhieuChamSocDetailController::class, 'store']);
    Route::get('/show/{id}', [PhieuChamSocDetailController::class, 'show']);
    Route::post('/update/{id}', [PhieuChamSocDetailController::class, 'update']);
    Route::post('/destroy/{id}', [PhieuChamSocDetailController::class, 'destroy']);
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

Route::group(['prefix' => 'phieuKhaiThacTienSuDiUngDetail'], function () {
    Route::get('/all', [PhieuKhaiThacTienSuDiUngDetailController::class, 'index']);
    Route::post('/create', [PhieuKhaiThacTienSuDiUngDetailController::class, 'store']);
    Route::get('/show/{id}', [PhieuKhaiThacTienSuDiUngDetailController::class, 'show']);
    Route::post('/update/{id}', [PhieuKhaiThacTienSuDiUngDetailController::class, 'update']);
    Route::post('/destroy/{id}', [PhieuKhaiThacTienSuDiUngDetailController::class, 'destroy']);
});