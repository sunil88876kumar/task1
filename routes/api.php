<?php

use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\PhaseController;
use Illuminate\Support\Facades\Route;

Route::get('/courses/{phase?}', [CourseController::class, 'index']);

Route::get('/phases', [PhaseController::class, 'index']);

Route::middleware(['auth:sanctum', 'isAdmin'])->post('/courses', [CourseController::class, 'store']);
