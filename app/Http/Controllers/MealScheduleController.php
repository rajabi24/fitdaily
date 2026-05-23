<?php

namespace App\Http\Controllers;

use App\Models\MealSchedule;
use App\Models\WorkoutSchedule;
use Illuminate\Http\Request;

class MealScheduleController extends Controller
{
    public function index()
    {
        $meals = MealSchedule::with('workout')->get()->groupBy('day');
        return view('meals.index', compact('meals'));
    }

    public function create()
    {
        $workouts = WorkoutSchedule::all();
        return view('meals.create', compact('workouts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'workout_schedule_id' => 'nullable|exists:workout_schedules,id',
            'day'                 => 'required|string',
            'meal_type'           => 'required|string',
            'menu_name'           => 'required|string',
            'calories'            => 'required|integer',
            'protein'             => 'required|string',
            'carbs'               => 'required|string',
            'description'         => 'nullable|string',
        ]);

        MealSchedule::create($request->all());

        return redirect('/meals')->with('success', 'Menu makan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $meal = MealSchedule::findOrFail($id);
        $workouts = WorkoutSchedule::all();
        return view('meals.edit', compact('meal', 'workouts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'workout_schedule_id' => 'nullable|exists:workout_schedules,id',
            'day'                 => 'required|string',
            'meal_type'           => 'required|string',
            'menu_name'           => 'required|string',
            'calories'            => 'required|integer',
            'protein'             => 'required|string',
            'carbs'               => 'required|string',
            'description'         => 'nullable|string',
        ]);

        $meal = MealSchedule::findOrFail($id);
        $meal->update($request->all());

        return redirect('/meals')->with('success', 'Menu makan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $meal = MealSchedule::findOrFail($id);
        $meal->delete();

        return redirect('/meals')->with('success', 'Menu makan berhasil dihapus!');
    }
}