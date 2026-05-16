@extends('layouts.app')

@section('title', 'Menu Makanan')

@section('content')

{{-- Header --}}
<div class="mb-10 fade-in">
    <a href="/" class="inline-flex items-center gap-1.5 text-slate-400 hover:text-blue-600 text-sm transition mb-4">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
    </a>
    <h1 class="text-4xl font-extrabold text-slate-800 mb-2">Menu Makanan</h1>
    <p class="text-slate-500">Jadwal makan harian untuk mendukung program diet & gym kamu.</p>
</div>

{{-- Meal Cards per Hari --}}
@foreach($meals as $day => $dayMeals)
@php $loopIndex = $loop->index; @endphp
    @php
        $totalCalories = $dayMeals->sum('calories');
        $totalProtein = $dayMeals->sum(fn($m) => (int) $m->protein);
        $totalCarbs = $dayMeals->sum(fn($m) => (int) $m->carbs);
    @endphp

    <div class="mb-10 fade-in-delay-{{ min($loop->index + 1, 3) }}">
        {{-- Day Header --}}
        <div class="flex flex-wrap items-center justify-between mb-4 gap-3">
            <div class="flex items-center gap-2">
                <div class="bg-blue-50 p-2 rounded-lg">
                    <i data-lucide="calendar-days" class="w-5 h-5 text-blue-600"></i>
                </div>
                <h2 class="text-2xl font-bold text-slate-800">{{ $day }}</h2>
            </div>
            <div class="flex gap-2 flex-wrap">
                <span class="inline-flex items-center gap-1.5 bg-red-50 border border-red-200 text-red-600 text-xs font-semibold px-3 py-1.5 rounded-full">
                    <i data-lucide="flame" class="w-3.5 h-3.5"></i>
                    {{ $totalCalories }} kkal
                </span>
                <span class="inline-flex items-center gap-1.5 bg-blue-50 border border-blue-200 text-blue-600 text-xs font-semibold px-3 py-1.5 rounded-full">
                    <i data-lucide="beef" class="w-3.5 h-3.5"></i>
                    {{ $totalProtein }}g protein
                </span>
                <span class="inline-flex items-center gap-1.5 bg-amber-50 border border-amber-200 text-amber-600 text-xs font-semibold px-3 py-1.5 rounded-full">
                    <i data-lucide="wheat" class="w-3.5 h-3.5"></i>
                    {{ $totalCarbs }}g karbo
                </span>
            </div>
        </div>

        {{-- Meal Items --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($dayMeals as $meal)
                @php
                    $mealIcon = match($meal->meal_type) {
                        'Sarapan'     => 'sunrise',
                        'Makan Siang' => 'sun',
                        'Makan Malam' => 'moon',
                        'Snack'       => 'apple',
                        default       => 'utensils',
                    };
                    $mealColor = match($meal->meal_type) {
                        'Sarapan'     => 'border-orange-200 hover:border-orange-300 hover:shadow-orange-50',
                        'Makan Siang' => 'border-yellow-200 hover:border-yellow-300 hover:shadow-yellow-50',
                        'Makan Malam' => 'border-blue-200 hover:border-blue-300 hover:shadow-blue-50',
                        'Snack'       => 'border-purple-200 hover:border-purple-300 hover:shadow-purple-50',
                        default       => 'border-slate-200',
                    };
                    $mealIconColor = match($meal->meal_type) {
                        'Sarapan'     => 'bg-orange-50 text-orange-500',
                        'Makan Siang' => 'bg-yellow-50 text-yellow-500',
                        'Makan Malam' => 'bg-blue-50 text-blue-500',
                        'Snack'       => 'bg-purple-50 text-purple-500',
                        default       => 'bg-slate-50 text-slate-500',
                    };
                @endphp

                <div class="bg-white border {{ $mealColor }} rounded-2xl p-5 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl shadow-sm">
                    {{-- Meal Type --}}
                    <div class="flex items-center gap-2 mb-3">
                        <div class="p-2 rounded-lg {{ $mealIconColor }}">
                            <i data-lucide="{{ $mealIcon }}" class="w-4 h-4"></i>
                        </div>
                        <span class="text-slate-500 text-xs font-semibold uppercase tracking-wide">
                            {{ $meal->meal_type }}
                        </span>
                    </div>

                    {{-- Menu Name --}}
                    <h3 class="text-slate-800 font-semibold text-sm mb-2 leading-snug">
                        {{ $meal->menu_name }}
                    </h3>

                    {{-- Description --}}
                    <p class="text-slate-400 text-xs mb-4 leading-relaxed">{{ $meal->description }}</p>

                    {{-- Nutrition Stats --}}
                    <div class="border-t border-slate-100 pt-3 grid grid-cols-3 gap-2 text-center">
                        <div>
                            <div class="text-red-500 font-bold text-sm">{{ $meal->calories }}</div>
                            <div class="text-slate-400 text-xs">kkal</div>
                        </div>
                        <div>
                            <div class="text-blue-500 font-bold text-sm">{{ $meal->protein }}</div>
                            <div class="text-slate-400 text-xs">protein</div>
                        </div>
                        <div>
                            <div class="text-amber-500 font-bold text-sm">{{ $meal->carbs }}</div>
                            <div class="text-slate-400 text-xs">karbo</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Divider --}}
    @if(!$loop->last)
        <hr class="border-slate-200 mb-10">
    @endif
@endforeach

@endsection