@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

{{-- Hero Section --}}
<div class="text-center py-16 fade-in">
    <div class="inline-flex items-center gap-2 bg-blue-50 border border-blue-200 rounded-full px-4 py-1.5 text-blue-600 text-sm font-medium mb-6">
        <i data-lucide="zap" class="w-4 h-4"></i>
        Fitness & Diet Tracker
    </div>
    <h1 class="text-5xl font-extrabold text-slate-800 mb-4 leading-tight">
        Selamat Datang di <br>
        <span class="text-blue-600">FitDaily</span>
    </h1>
    <p class="text-slate-500 text-lg max-w-xl mx-auto mb-10">
        Pantau jadwal latihan dan menu makan sehatmu setiap hari. <span class="text-blue-600 font-semibold">Konsisten adalah kunci.
    </p>
    <div class="flex justify-center gap-4">
        <a href="/workouts" class="inline-flex items-center gap-2 bg-white text-blue-600 font-semibold px-8 py-3 rounded-xl transition-all duration-300 border-2 border-blue-600 hover:bg-blue-600 hover:text-white hover:-translate-y-0.5 hover:shadow-lg hover:shadow-blue-200 shadow-sm">
            <i data-lucide="dumbbell" class="w-5 h-5"></i>
            Lihat Jadwal Latihan
        </a>
        <a href="/meals" class="inline-flex items-center gap-2 bg-white text-blue-600 font-semibold px-8 py-3 rounded-xl transition-all duration-300 border-2 border-blue-600 hover:bg-blue-600 hover:text-white hover:-translate-y-0.5 hover:shadow-lg hover:shadow-blue-200 shadow-sm">
            <i data-lucide="utensils" class="w-5 h-5"></i>
            Lihat Menu Makan
        </a>
    </div>
</div>

{{-- Stats Section --}}
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-16 fade-in-delay-1">
    <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-100">
        <div class="flex justify-center mb-2">
            <div class="bg-blue-50 p-3 rounded-xl">
                <i data-lucide="dumbbell" class="w-6 h-6 text-blue-600"></i>
            </div>
        </div>
        <div class="text-3xl font-extrabold text-blue-600">4x</div>
        <div class="text-slate-500 text-sm mt-1 font-medium">Gym per Minggu</div>
    </div>
    <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-100">
        <div class="flex justify-center mb-2">
            <div class="bg-blue-50 p-3 rounded-xl">
                <i data-lucide="footprints" class="w-6 h-6 text-blue-600"></i>
            </div>
        </div>
        <div class="text-3xl font-extrabold text-blue-600">2x</div>
        <div class="text-slate-500 text-sm mt-1 font-medium">Running per Minggu</div>
    </div>
    <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-100">
        <div class="flex justify-center mb-2">
            <div class="bg-blue-50 p-3 rounded-xl">
                <i data-lucide="flame" class="w-6 h-6 text-blue-600"></i>
            </div>
        </div>
        <div class="text-3xl font-extrabold text-blue-600">~1.3K</div>
        <div class="text-slate-500 text-sm mt-1 font-medium">Kalori Hari Gym</div>
    </div>
    <div class="bg-white border border-slate-200 rounded-2xl p-6 text-center shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-100">
        <div class="flex justify-center mb-2">
            <div class="bg-blue-50 p-3 rounded-xl">
                <i data-lucide="calendar" class="w-6 h-6 text-blue-600"></i>
            </div>
        </div>
        <div class="text-3xl font-extrabold text-blue-600">7</div>
        <div class="text-slate-500 text-sm mt-1 font-medium">Hari Terjadwal</div>
    </div>
</div>

{{-- Today Summary --}}
<div class="mb-16 fade-in-delay-2">
    <div class="flex items-center gap-2 mb-6">
        <div class="bg-blue-50 p-2 rounded-lg">
            <i data-lucide="calendar-check" class="w-5 h-5 text-blue-600"></i>
        </div>
        <h2 class="text-2xl font-bold text-slate-800">Hari Ini — <span class="text-blue-600">{{ $todayName }}</span></h2>
    </div>

    <div class="grid md:grid-cols-2 gap-6">
        {{-- Today Workout --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-100">
            <div class="flex items-center gap-2 mb-4">
                <div class="bg-blue-50 p-2 rounded-lg">
                    <i data-lucide="dumbbell" class="w-4 h-4 text-blue-600"></i>
                </div>
                <h3 class="font-bold text-slate-700">Latihan Hari Ini</h3>
            </div>
            @if($todayWorkout)
                <div class="flex items-center justify-between mb-3">
                    <span class="text-lg font-extrabold text-slate-800">{{ $todayWorkout->exercise_name }}</span>
                    @php
                        $catColor = match($todayWorkout->category) {
                            'Gym' => 'bg-blue-50 text-blue-600 border-blue-200',
                            'Running' => 'bg-emerald-50 text-emerald-600 border-emerald-200',
                            'Rest' => 'bg-slate-100 text-slate-500 border-slate-200',
                            default => 'bg-slate-100 text-slate-500 border-slate-200',
                        };
                    @endphp
                    <span class="text-xs font-semibold border px-3 py-1 rounded-full {{ $catColor }}">
                        {{ $todayWorkout->category }}
                    </span>
                </div>
                <p class="text-slate-400 text-sm mb-4">{{ $todayWorkout->description }}</p>
                <div class="flex gap-4">
                    <div class="flex items-center gap-1.5 text-sm text-slate-500">
                        <i data-lucide="clock" class="w-4 h-4 text-blue-400"></i>
                        {{ $todayWorkout->duration > 0 ? $todayWorkout->duration . ' menit' : '-' }}
                    </div>
                    <div class="flex items-center gap-1.5 text-sm text-slate-500">
                        <i data-lucide="zap" class="w-4 h-4 text-blue-400"></i>
                        {{ $todayWorkout->intensity }}
                    </div>
                </div>
            @else
                <p class="text-slate-400 text-sm">Tidak ada jadwal latihan hari ini.</p>
            @endif
        </div>

        {{-- Today Nutrition --}}
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-100">
            <div class="flex items-center gap-2 mb-4">
                <div class="bg-blue-50 p-2 rounded-lg">
                    <i data-lucide="utensils" class="w-4 h-4 text-blue-600"></i>
                </div>
                <h3 class="font-bold text-slate-700">Nutrisi Hari Ini</h3>
            </div>
            @if($todayMeals->count() > 0)
                {{-- Calorie Progress Bar --}}
                @php $calorieTarget = 1500; $caloriePercent = min(100, round(($totalCaloriesToday / $calorieTarget) * 100)); @endphp
                <div class="mb-4">
                    <div class="flex justify-between text-sm mb-1.5">
                        <span class="text-slate-500 font-medium">Kalori</span>
                        <span class="text-blue-600 font-bold">{{ $totalCaloriesToday }} / {{ $calorieTarget }} kkal</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2.5">
                        <div class="bg-blue-600 h-2.5 rounded-full transition-all duration-700" style="width: {{ $caloriePercent }}%"></div>
                    </div>
                    <div class="text-right text-xs text-slate-400 mt-1">{{ $caloriePercent }}% dari target</div>
                </div>

                {{-- Protein & Carbs --}}
                <div class="grid grid-cols-2 gap-3 mb-4">
                    <div class="bg-blue-50 rounded-xl p-3 text-center">
                        <div class="text-blue-600 font-extrabold text-lg">{{ $totalProteinToday }}g</div>
                        <div class="text-slate-400 text-xs">Total Protein</div>
                    </div>
                    <div class="bg-amber-50 rounded-xl p-3 text-center">
                        <div class="text-amber-500 font-extrabold text-lg">{{ $todayMeals->sum(fn($m) => (int) $m->carbs) }}g</div>
                        <div class="text-slate-400 text-xs">Total Karbo</div>
                    </div>
                </div>

                {{-- Meal List --}}
                <div class="space-y-2">
                    @foreach($todayMeals as $meal)
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-slate-600">{{ $meal->meal_type }}</span>
                            <span class="text-slate-400">{{ $meal->menu_name }}</span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-slate-400 text-sm">Tidak ada jadwal makan hari ini.</p>
            @endif
        </div>
    </div>
</div>

{{-- Card Menu --}}
<div class="grid md:grid-cols-2 gap-6 fade-in-delay-3">
    <a href="/workouts" class="group bg-white border border-slate-200 hover:border-blue-300 rounded-2xl p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-100 shadow-sm">
        <div class="bg-blue-50 w-12 h-12 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-100 transition">
            <i data-lucide="dumbbell" class="w-6 h-6 text-blue-600"></i>
        </div>
        <h2 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition">Jadwal Latihan</h2>
        <p class="text-slate-500 text-sm leading-relaxed">Lihat program latihan mingguanmu Gym, Running, dan Rest Day lengkap dengan durasi dan intensitas.</p>
        <div class="mt-5 inline-flex items-center gap-1.5 text-blue-600 text-sm font-semibold">
            Lihat Jadwal <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </div>
    </a>
    <a href="/meals" class="group bg-white border border-slate-200 hover:border-blue-300 rounded-2xl p-8 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-100 shadow-sm">
        <div class="bg-blue-50 w-12 h-12 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-100 transition">
            <i data-lucide="utensils" class="w-6 h-6 text-blue-600"></i>
        </div>
        <h2 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-blue-600 transition">Menu Makanan</h2>
        <p class="text-slate-500 text-sm leading-relaxed">Pantau menu makan harianmu lengkap dengan kalori, protein, dan karbohidrat setiap sesi makan.</p>
        <div class="mt-5 inline-flex items-center gap-1.5 text-blue-600 text-sm font-semibold">
            Lihat Menu <i data-lucide="arrow-right" class="w-4 h-4"></i>
        </div>
    </a>
</div>

@endsection