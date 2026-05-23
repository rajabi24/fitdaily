<?php

namespace App\Http\Controllers;

use App\Models\WorkoutSchedule;
use App\Models\MealSchedule;
use Illuminate\Http\Request;

class WorkoutScheduleController extends Controller
{
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

    public function index()
    {
        $workouts = WorkoutSchedule::with('meals')->get();
        return view('workouts.index', compact('workouts'));
    }

    public function show($id)
    {
        $workout = WorkoutSchedule::with('meals')->findOrFail($id);
        return view('workouts.show', compact('workout'));
    }

    public function create()
    {
        return view('workouts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'day'           => 'required|string',
            'exercise_name' => 'required|string',
            'category'      => 'required|string',
            'duration'      => 'required|integer',
            'intensity'     => 'required|string',
            'description'   => 'nullable|string',
        ]);

        WorkoutSchedule::create($request->all());

        return redirect('/workouts')->with('success', 'Jadwal latihan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $workout = WorkoutSchedule::findOrFail($id);
        return view('workouts.edit', compact('workout'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'day'           => 'required|string',
            'exercise_name' => 'required|string',
            'category'      => 'required|string',
            'duration'      => 'required|integer',
            'intensity'     => 'required|string',
            'description'   => 'nullable|string',
        ]);

        $workout = WorkoutSchedule::findOrFail($id);
        $workout->update($request->all());

        return redirect('/workouts')->with('success', 'Jadwal latihan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $workout = WorkoutSchedule::findOrFail($id);
        $workout->delete();

        return redirect('/workouts')->with('success', 'Jadwal latihan berhasil dihapus!');
    }
}