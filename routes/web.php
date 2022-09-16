<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StudentController::class, 'index'])
    ->name('index');

Route::post('/import', [StudentController::class, 'import'])
    ->name('import');

Route::get('/export', [StudentController::class, 'export'])
    ->name('export');
