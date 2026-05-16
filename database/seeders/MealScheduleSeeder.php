<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MealSchedule;

class MealScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $meals = [
            // SENIN (Gym)
            ['day' => 'Senin', 'meal_type' => 'Sarapan', 'menu_name' => '2 Butir Telur', 'calories' => 150, 'protein' => '12g', 'carbs' => '1g', 'description' => 'Rebus atau goreng rendah minyak.'],
            ['day' => 'Senin', 'meal_type' => 'Makan Siang', 'menu_name' => 'Nasi Merah + Sayur + 1 Telur', 'calories' => 400, 'protein' => '12g', 'carbs' => '45g', 'description' => 'Sayur kangkung/pakcoy untuk serat.'],
            ['day' => 'Senin', 'meal_type' => 'Snack', 'menu_name' => '2 Butir Telur Rebus', 'calories' => 150, 'protein' => '12g', 'carbs' => '1g', 'description' => 'Pre-gym snack untuk asupan protein.'],
            ['day' => 'Senin', 'meal_type' => 'Makan Malam', 'menu_name' => 'Nasi Merah + 1 Dada Ayam Full', 'calories' => 600, 'protein' => '55g', 'carbs' => '45g', 'description' => 'Post-gym recovery (Potongan utuh).'],

            // SELASA (Rest)
            ['day' => 'Selasa', 'meal_type' => 'Sarapan', 'menu_name' => '2 Butir Telur', 'calories' => 150, 'protein' => '12g', 'carbs' => '1g', 'description' => 'Maintenance protein di pagi hari.'],
            ['day' => 'Selasa', 'meal_type' => 'Makan Siang', 'menu_name' => 'Nasi Merah + Sayur + 1/2 Dada Ayam', 'calories' => 450, 'protein' => '33g', 'carbs' => '45g', 'description' => 'Jatah ayam dibagi dua (siang & malam).'],
            ['day' => 'Selasa', 'meal_type' => 'Makan Malam', 'menu_name' => 'Nasi Merah + 1 Telur + 1/2 Dada Ayam', 'calories' => 450, 'protein' => '33g', 'carbs' => '45g', 'description' => 'Sisa setengah bagian ayam dari siang.'],

            // RABU (Gym)
            ['day' => 'Rabu', 'meal_type' => 'Sarapan', 'menu_name' => '2 Butir Telur', 'calories' => 150, 'protein' => '12g', 'carbs' => '1g', 'description' => 'Persiapan protein harian.'],
            ['day' => 'Rabu', 'meal_type' => 'Makan Siang', 'menu_name' => 'Nasi Merah + Sayur + 1 Telur', 'calories' => 400, 'protein' => '12g', 'carbs' => '45g', 'description' => 'Makan siang ringan sebelum gym.'],
            ['day' => 'Rabu', 'meal_type' => 'Snack', 'menu_name' => '2 Telur Rebus', 'calories' => 150, 'protein' => '12g', 'carbs' => '1g', 'description' => 'Dimakan 1-2 jam sebelum latihan.'],
            ['day' => 'Rabu', 'meal_type' => 'Makan Malam', 'menu_name' => 'Nasi Merah + 1 Dada Ayam Full', 'calories' => 600, 'protein' => '55g', 'carbs' => '45g', 'description' => 'Nutrisi maksimal setelah latihan back.'],

            // KAMIS (Gym)
            ['day' => 'Kamis', 'meal_type' => 'Sarapan', 'menu_name' => '2 Butir Telur', 'calories' => 150, 'protein' => '12g', 'carbs' => '1g', 'description' => 'Protein dasar pagi hari.'],
            ['day' => 'Kamis', 'meal_type' => 'Makan Siang', 'menu_name' => 'Nasi Merah + Sayur + 1 Telur', 'calories' => 400, 'protein' => '12g', 'carbs' => '45g', 'description' => 'Karbohidrat kompleks untuk energi.'],
            ['day' => 'Kamis', 'meal_type' => 'Snack', 'menu_name' => '2 Telur Rebus', 'calories' => 150, 'protein' => '12g', 'carbs' => '1g', 'description' => 'Dimakan sebelum sesi bahu/bisep.'],
            ['day' => 'Kamis', 'meal_type' => 'Makan Malam', 'menu_name' => 'Nasi Merah + 1 Dada Ayam Full', 'calories' => 600, 'protein' => '55g', 'carbs' => '45g', 'description' => 'Pemulihan otot setelah latihan.'],

            // JUMAT (Rest)
            ['day' => 'Jumat', 'meal_type' => 'Sarapan', 'menu_name' => '2 Butir Telur', 'calories' => 150, 'protein' => '12g', 'carbs' => '1g', 'description' => 'Setelah running pagi.'],
            ['day' => 'Jumat', 'meal_type' => 'Makan Siang', 'menu_name' => 'Nasi Merah + Sayur + 1/2 Dada Ayam', 'calories' => 450, 'protein' => '33g', 'carbs' => '45g', 'description' => 'Menjaga metabolisme di hari libur.'],
            ['day' => 'Jumat', 'meal_type' => 'Makan Malam', 'menu_name' => 'Nasi Merah + 1 Telur + 1/2 Dada Ayam', 'calories' => 450, 'protein' => '33g', 'carbs' => '45g', 'description' => 'Tetap disiplin protein meski rest day.'],

            // SABTU (Gym)
            ['day' => 'Sabtu', 'meal_type' => 'Sarapan', 'menu_name' => '2 Butir Telur', 'calories' => 150, 'protein' => '12g', 'carbs' => '1g', 'description' => 'Energi awal sebelum Mega Day.'],
            ['day' => 'Sabtu', 'meal_type' => 'Makan Siang', 'menu_name' => 'Nasi Merah + Sayur + 1 Telur', 'calories' => 400, 'protein' => '12g', 'carbs' => '45g', 'description' => 'Persiapan untuk latihan kaki & dada.'],
            ['day' => 'Sabtu', 'meal_type' => 'Snack', 'menu_name' => '2 Telur Rebus', 'calories' => 150, 'protein' => '12g', 'carbs' => '1g', 'description' => 'Wajib makan agar tidak lemas saat squat.'],
            ['day' => 'Sabtu', 'meal_type' => 'Makan Malam', 'menu_name' => 'Nasi Merah + 1 Dada Ayam Full', 'calories' => 600, 'protein' => '55g', 'carbs' => '45g', 'description' => 'Recovery paling penting di minggu ini.'],

            // MINGGU (Rest)
            ['day' => 'Minggu', 'meal_type' => 'Sarapan', 'menu_name' => '2 Butir Telur', 'calories' => 150, 'protein' => '12g', 'carbs' => '1g', 'description' => 'Setelah running/kardio santai.'],
            ['day' => 'Minggu', 'meal_type' => 'Makan Siang', 'menu_name' => 'Nasi Merah + Sayur + 1/2 Dada Ayam', 'calories' => 450, 'protein' => '33g', 'carbs' => '45g', 'description' => 'Menikmati hari istirahat.'],
            ['day' => 'Minggu', 'meal_type' => 'Makan Malam', 'menu_name' => 'Nasi Merah + 1 Telur + 1/2 Dada Ayam', 'calories' => 450, 'protein' => '33g', 'carbs' => '45g', 'description' => 'Penutup minggu yang konsisten.'],
        ];

        foreach ($meals as $meal) {
            MealSchedule::create($meal);
        }
    }
}