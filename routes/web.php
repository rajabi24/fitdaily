<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutScheduleController;
use App\Http\Controllers\MealScheduleController;

// Home
Route::get('/', [WorkoutScheduleController::class, 'home']);

// Workout CRUD
Route::get('/workouts', [WorkoutScheduleController::class, 'index']);
Route::get('/workouts/create', [WorkoutScheduleController::class, 'create']);
Route::post('/workouts', [WorkoutScheduleController::class, 'store']);
Route::get('/workouts/{id}/edit', [WorkoutScheduleController::class, 'edit']);
Route::put('/workouts/{id}', [WorkoutScheduleController::class, 'update']);
Route::delete('/workouts/{id}', [WorkoutScheduleController::class, 'destroy']);
Route::get('/workouts/{id}', [WorkoutScheduleController::class, 'show']);

// Meal CRUD
Route::get('/meals', [MealScheduleController::class, 'index']);
Route::get('/meals/create', [MealScheduleController::class, 'create']);
Route::post('/meals', [MealScheduleController::class, 'store']);
Route::get('/meals/{id}/edit', [MealScheduleController::class, 'edit']);
Route::put('/meals/{id}', [MealScheduleController::class, 'update']);
Route::delete('/meals/{id}', [MealScheduleController::class, 'destroy']);