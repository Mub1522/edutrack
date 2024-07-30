<?php

use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\GuardianController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin'
])->group(function () {
    Route::resource('/estudiantes', StudentController::class)
        ->names('students');
    Route::resource('/acudientes', GuardianController::class)
        ->names('guardians');
});
