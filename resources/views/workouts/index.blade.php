@extends('layouts.app')

@section('title', 'Jadwal Latihan')

@section('content')

{{-- Header --}}
<div class="mb-10 fade-in">
    <a href="/" class="inline-flex items-center gap-1.5 text-slate-400 hover:text-blue-600 text-sm transition mb-4">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
    </a>
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-extrabold text-slate-800 mb-2">Jadwal Latihan</h1>
            <p class="text-slate-500">Program latihan mingguan — konsisten adalah kunci perubahan.</p>
        </div>
        <a href="/workouts/create" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-3 rounded-xl transition shadow-md shadow-blue-200">
            <i data-lucide="plus" class="w-5 h-5"></i> Tambah Latihan
        </a>
    </div>
</div>

{{-- Success Message --}}
@if(session('success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl p-4 mb-6 fade-in flex items-center gap-2">
        <i data-lucide="check-circle" class="w-5 h-5"></i>
        {{ session('success') }}
    </div>
@endif

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

        <div class="bg-white border border-slate-200 {{ $cardBorder }} rounded-2xl p-6 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 shadow-sm">
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

            {{-- Meal Count Badge --}}
            <span class="inline-flex items-center gap-1 bg-slate-100 text-slate-500 text-xs font-semibold px-3 py-1 rounded-full mb-3 ml-2">
                <i data-lucide="utensils" class="w-3 h-3"></i>
                {{ $workout->meals->count() }} menu
            </span>

            {{-- Exercise Name --}}
            <h3 class="text-slate-800 font-semibold text-base mb-2 leading-snug">
                {{ $workout->exercise_name }}
            </h3>

            {{-- Description --}}
            <p class="text-slate-400 text-sm mb-4 leading-relaxed">{{ $workout->description }}</p>

            {{-- Stats --}}
            <div class="flex items-center justify-between pt-4 border-t border-slate-100 mb-4">
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

            {{-- Action Buttons --}}
            <div class="flex gap-2">
                <a href="/workouts/{{ $workout->id }}" class="flex-1 text-center bg-slate-50 hover:bg-slate-100 text-slate-600 text-xs font-semibold py-2 rounded-lg transition inline-flex items-center justify-center gap-1">
                    <i data-lucide="eye" class="w-3.5 h-3.5"></i> Detail
                </a>
                <a href="/workouts/{{ $workout->id }}/edit" class="flex-1 text-center bg-blue-50 hover:bg-blue-100 text-blue-600 text-xs font-semibold py-2 rounded-lg transition inline-flex items-center justify-center gap-1">
                    <i data-lucide="pencil" class="w-3.5 h-3.5"></i> Edit
                </a>
                <form action="/workouts/{{ $workout->id }}" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus jadwal {{ $workout->day }}?')" class="w-full bg-red-50 hover:bg-red-100 text-red-500 text-xs font-semibold py-2 rounded-lg transition inline-flex items-center justify-center gap-1">
                        <i data-lucide="trash-2" class="w-3.5 h-3.5"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>

@endsection