<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MealSchedule extends Model
{
    protected $fillable = [
        'day',
        'meal_type',
        'menu_name',
        'calories',
        'protein',
        'carbs',
        'description',
    ];
}