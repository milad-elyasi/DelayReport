<?php

use App\Http\Controllers\Api\V1\AssigneeController;
use App\Http\Controllers\Api\V1\DelayReportController;
use App\Http\Controllers\Api\V1\VendorController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->namespace('App\Http\Controllers\Api\V1')->group(function () {
    Route::prefix('delay-report')->group(function () {
        Route::post('/', [DelayReportController::class, 'create']);
    });

    Route::prefix('vendors')->group(function () {
        Route::get('delay', [VendorController::class, 'calculateDelay']);
    });

    Route::prefix('assignee')->group(function () {
        Route::post('assign', [AssigneeController::class, 'assign']);
    });
});
