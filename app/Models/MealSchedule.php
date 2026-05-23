<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealSchedule extends Model
{
    protected $fillable = [
        'workout_schedule_id',
        'day',
        'meal_type',
        'menu_name',
        'calories',
        'protein',
        'carbs',
        'description',
    ];

    public function workout()
    {
    return $this->belongsTo(WorkoutSchedule::class, 'workout_schedule_id');
    }
}