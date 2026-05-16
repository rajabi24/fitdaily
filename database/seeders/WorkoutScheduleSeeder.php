<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkoutSchedule;

class WorkoutScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $workouts = [
            [
                'day' => 'Senin',
                'exercise_name' => 'Chest, Shoulder (Light), Tricep',
                'category' => 'Gym',
                'duration' => 75,
                'intensity' => 'Berat',
                'description' => 'Fokus push movement (Dada & otot dorong).',
            ],
            [
                'day' => 'Selasa',
                'exercise_name' => 'Kuliah Full / Recovery',
                'category' => 'Rest',
                'duration' => 0,
                'intensity' => '-',
                'description' => 'Istirahat total karena jadwal kampus padat.',
            ],
            [
                'day' => 'Rabu',
                'exercise_name' => 'Back, Bicep, & Accessory',
                'category' => 'Gym',
                'duration' => 60,
                'intensity' => 'Sedang',
                'description' => 'Fokus pull movement (Punggung & otot tarik).',
            ],
            [
                'day' => 'Kamis',
                'exercise_name' => 'Shoulder & Bicep',
                'category' => 'Gym',
                'duration' => 60,
                'intensity' => 'Sedang',
                'description' => 'Fokus pembentukan bahu & otot lengan.',
            ],
            [
                'day' => 'Jumat',
                'exercise_name' => 'Morning Run / Walking',
                'category' => 'Running',
                'duration' => 30,
                'intensity' => 'Ringan',
                'description' => 'Kardio ringan untuk kesehatan jantung.',
            ],
            [
                'day' => 'Sabtu',
                'exercise_name' => 'Chest, Legs, Tricep',
                'category' => 'Gym',
                'duration' => 90,
                'intensity' => 'Berat',
                'description' => 'Sesi paling berat (Hajar Kaki & Dada).',
            ],
            [
                'day' => 'Minggu',
                'exercise_name' => 'Cardio (Flexi Time)',
                'category' => 'Running',
                'duration' => 45,
                'intensity' => 'Ringan',
                'description' => 'Lari santai pagi atau sore sesuai kondisi.',
            ],
        ];

        foreach ($workouts as $workout) {
            WorkoutSchedule::create($workout);
        }
    }
}