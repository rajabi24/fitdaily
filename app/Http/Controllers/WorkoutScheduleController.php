<?php

namespace App\Http\Controllers;

use App\Models\WorkoutSchedule;
use App\Models\MealSchedule;

class WorkoutScheduleController extends Controller
{
    public function index()
    {
        $workouts = WorkoutSchedule::all();
        return view('workouts.index', compact('workouts'));
    }

    public function home()
    {
        $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        $todayName = $days[date('w')];

        $todayWorkout = WorkoutSchedule::where('day', $todayName)->first();
        $todayMeals = MealSchedule::where('day', $todayName)->get();
        $totalCaloriesToday = $todayMeals->sum('calories');
        $totalProteinToday = $todayMeals->sum(fn($m) => (int) $m->protein);

        return view('home', compact('todayWorkout', 'todayMeals', 'totalCaloriesToday', 'totalProteinToday', 'todayName'));
    }
}