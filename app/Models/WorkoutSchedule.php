<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutSchedule extends Model
{
    protected $fillable = [
        'day',
        'exercise_name',
        'category',
        'duration',
        'intensity',
        'description',
    ];

    public function meals()
    {
        return $this->hasMany(MealSchedule::class);
    }
}