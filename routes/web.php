<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', function () {
        $user = Auth::user();

        switch ($user->role) {
            case 'admin':
                return view('admin.dashboard');
            case 'student':
                return view('student.dashboard');
            case 'teacher':
                return view('teacher.dashboard');
            default:
                return view('dashboard');
        }
    })->name('dashboard');
});
