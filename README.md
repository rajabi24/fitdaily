# FitDaily — Fitness & Diet Tracker

Aplikasi web berbasis Laravel MVC untuk memantau jadwal latihan dan menu makan harian.

## Identitas
- **Nama:** Muhammad Riskan Rajabi
- **NIM:** 2408107010110
- **Mata Kuliah:** Pemrograman Berbasis Web
- **Universitas:** Universitas Syiah Kuala

## Deskripsi
FitDaily adalah aplikasi tracking jadwal latihan gym dan menu makanan harian yang dibangun menggunakan framework Laravel dengan konsep MVC (Model-View-Controller).

## Fitur
- Jadwal latihan mingguan (Gym, Running, Rest Day)
- Menu makanan harian lengkap dengan kalori, protein, dan karbohidrat
- Summary hari ini di halaman utama
- Progress bar kalori harian
- Active state navbar
- Animasi fade-in

## Tech Stack
- **Framework:** Laravel 13
- **Database:** MySQL
- **Frontend:** Tailwind CSS, Lucide Icons, Inter Font
- **Hosting:** Railway

## Live Demo
[https://fitdaily-production.up.railway.app](https://fitdaily-production.up.railway.app)

## Cara Menjalankan

```bash
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## Struktur MVC
- **Model:** `WorkoutSchedule`, `MealSchedule`
- **View:** `home.blade.php`, `workouts/index.blade.php`, `meals/index.blade.php`
- **Controller:** `WorkoutScheduleController`, `MealScheduleController`