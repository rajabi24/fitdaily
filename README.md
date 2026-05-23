# FitDaily — Fitness & Diet Tracker

Aplikasi web berbasis Laravel MVC untuk memantau jadwal latihan dan menu makan harian.

- **Nama:** Muhammad Riskan Rajabi
- **NIM:** 2408107010110
- **Mata Kuliah:** Pemrograman Berbasis Web
- **Universitas:** Universitas Syiah Kuala

## Deskripsi
FitDaily adalah aplikasi tracking jadwal latihan gym dan menu makanan harian yang dibangun menggunakan framework Laravel dengan konsep MVC (Model-View-Controller) dan Eloquent ORM.

## Fitur
- Jadwal latihan mingguan (Gym, Running, Rest Day)
- Menu makanan harian lengkap dengan kalori, protein, dan karbohidrat
- CRUD lengkap untuk jadwal latihan dan menu makan
- Relasi antar tabel (hasMany & belongsTo)
- Summary hari ini di halaman utama
- Progress bar kalori harian
- Cascade delete (hapus latihan → meal ikut terhapus)

## Tech Stack
- **Framework:** Laravel 13
- **Database:** MySQL
- **ORM:** Eloquent
- **Frontend:** Tailwind CSS, Lucide Icons, Inter Font
- **Hosting:** Railway

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
- **View:** `home.blade.php`, `workouts/index.blade.php`, `workouts/show.blade.php`, `workouts/create.blade.php`, `workouts/edit.blade.php`, `meals/index.blade.php`, `meals/create.blade.php`, `meals/edit.blade.php`
- **Controller:** `WorkoutScheduleController`, `MealScheduleController`

## Relasi Eloquent
- `WorkoutSchedule` hasMany `MealSchedule`
- `MealSchedule` belongsTo `WorkoutSchedule`

## Eloquent Methods yang Digunakan
- `create()` — menambah data baru
- `find()` / `findOrFail()` — mencari data by ID
- `where()` — filter data
- `update()` — mengubah data
- `delete()` — menghapus data