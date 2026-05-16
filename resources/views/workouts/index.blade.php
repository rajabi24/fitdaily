@extends('layouts.app')

@section('title', 'Jadwal Latihan')

@section('content')

{{-- Header --}}
<div class="mb-10 fade-in">
    <a href="/" class="inline-flex items-center gap-1.5 text-slate-400 hover:text-blue-600 text-sm transition mb-4">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
    </a>
    <h1 class="text-4xl font-extrabold text-slate-800 mb-2">Jadwal Latihan</h1>
    <p class="text-slate-500">Program latihan mingguan <span class="text-blue-600 font-semibold">ingat konsisten adalah kunci perubahan.</p>
</div>

{{-- Workout Cards --}}
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 fade-in-delay-1">
    @foreach($workouts as $workout)
        @php
            $categoryColor = match($workout->category) {
                'Gym'     => 'text-blue-600 bg-blue-50 border-blue-200',
                'Running' => 'text-emerald-600 bg-emerald-50 border-emerald-200',
                'Rest'    => 'text-slate-500 bg-slate-100 border-slate-200',
                default   => 'text-slate-500 bg-slate-100 border-slate-200',
            };
            $intensityColor = match($workout->intensity) {
                'Berat'  => 'text-red-600 bg-red-50',
                'Sedang' => 'text-amber-600 bg-amber-50',
                'Ringan' => 'text-emerald-600 bg-emerald-50',
                default  => 'text-slate-500 bg-slate-100',
            };
            $icon = match($workout->category) {
                'Gym'     => 'dumbbell',
                'Running' => 'footprints',
                'Rest'    => 'moon',
                default   => 'activity',
            };
            $cardBorder = match($workout->category) {
                'Gym'     => 'hover:border-blue-300 hover:shadow-blue-50',
                'Running' => 'hover:border-emerald-300 hover:shadow-emerald-50',
                'Rest'    => 'hover:border-slate-300 hover:shadow-slate-50',
                default   => 'hover:border-slate-300',
            };
        @endphp

        <div class="bg-white border border-slate-200 {{ $cardBorder }} rounded-2xl p-6 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl shadow-sm">
            {{-- Day & Icon --}}
            <div class="flex items-center justify-between mb-4">
                <span class="text-2xl font-extrabold text-slate-800">{{ $workout->day }}</span>
                <div class="bg-blue-50 p-2.5 rounded-xl">
                    <i data-lucide="{{ $icon }}" class="w-5 h-5 text-blue-600"></i>
                </div>
            </div>

            {{-- Category Badge --}}
            <span class="inline-flex items-center border text-xs font-semibold px-3 py-1 rounded-full mb-3 {{ $categoryColor }}">
                {{ $workout->category }}
            </span>

            {{-- Exercise Name --}}
            <h3 class="text-slate-800 font-semibold text-base mb-2 leading-snug">
                {{ $workout->exercise_name }}
            </h3>

            {{-- Description --}}
            <p class="text-slate-400 text-sm mb-4 leading-relaxed">{{ $workout->description }}</p>

            {{-- Stats --}}
            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <div class="flex items-center gap-2">
                    <i data-lucide="clock" class="w-4 h-4 text-blue-400"></i>
                    <div>
                        <div class="text-blue-600 font-bold text-base">
                            {{ $workout->duration > 0 ? $workout->duration . ' mnt' : '-' }}
                        </div>
                        <div class="text-slate-400 text-xs">Durasi</div>
                    </div>
                </div>
                <div class="text-right">
                    <span class="text-xs font-semibold px-3 py-1.5 rounded-full {{ $intensityColor }}">
                        {{ $workout->intensity }}
                    </span>
                    <div class="text-slate-400 text-xs mt-1">Intensitas</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection