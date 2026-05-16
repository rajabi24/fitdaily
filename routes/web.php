<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutScheduleController;
use App\Http\Controllers\MealScheduleController;

Route::get('/', [WorkoutScheduleController::class, 'home']);
Route::get('/workouts', [WorkoutScheduleController::class, 'index']);
Route::get('/meals', [MealScheduleController::class, 'index']);