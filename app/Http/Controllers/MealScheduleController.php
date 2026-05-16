<?php

namespace App\Http\Controllers;

use App\Models\MealSchedule;

class MealScheduleController extends Controller
{
    public function index()
    {
        $meals = MealSchedule::all()->groupBy('day');
        return view('meals.index', compact('meals'));
    }
}