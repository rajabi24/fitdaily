@extends('layouts.app')

@section('title', 'Detail Latihan')

@section('content')

<div class="mb-10 fade-in">
    <a href="/workouts" class="inline-flex items-center gap-1.5 text-slate-400 hover:text-blue-600 text-sm transition mb-4">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
    </a>
    <div class="flex items-center justify-between">
        <h1 class="text-4xl font-extrabold text-slate-800 mb-2">Detail Latihan</h1>
        <div class="flex gap-2">
            <a href="/workouts/{{ $workout->id }}/edit" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-xl transition text-sm">
                <i data-lucide="pencil" class="w-4 h-4"></i> Edit
            </a>
            <form action="/workouts/{{ $workout->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus jadwal ini?')" class="inline-flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-xl transition text-sm">
                    <i data-lucide="trash-2" class="w-4 h-4"></i> Hapus
                </button>
            </form>
        </div>
    </div>
</div>

{{-- Workout Detail --}}
<div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm mb-8 fade-in-delay-1">
    <div class="grid md:grid-cols-2 gap-6">
        <div>
            <div class="text-slate-400 text-sm mb-1">Hari</div>
            <div class="text-slate-800 font-bold text-xl">{{ $workout->day }}</div>
        </div>
        <div>
            <div class="text-slate-400 text-sm mb-1">Kategori</div>
            @php
                $catColor = match($workout->category) {
                    'Gym' => 'text-blue-600 bg-blue-50 border-blue-200',
                    'Running' => 'text-emerald-600 bg-emerald-50 border-emerald-200',
                    'Rest' => 'text-slate-500 bg-slate-100 border-slate-200',
                    default => 'text-slate-500 bg-slate-100 border-slate-200',
                };
            @endphp
            <span class="inline-flex border text-xs font-semibold px-3 py-1 rounded-full {{ $catColor }}">
                {{ $workout->category }}
            </span>
        </div>
        <div>
            <div class="text-slate-400 text-sm mb-1">Nama Latihan</div>
            <div class="text-slate-800 font-semibold">{{ $workout->exercise_name }}</div>
        </div>
        <div>
            <div class="text-slate-400 text-sm mb-1">Intensitas</div>
            <div class="text-slate-800 font-semibold">{{ $workout->intensity }}</div>
        </div>
        <div>
            <div class="text-slate-400 text-sm mb-1">Durasi</div>
            <div class="text-slate-800 font-semibold">{{ $workout->duration > 0 ? $workout->duration . ' menit' : '-' }}</div>
        </div>
        <div>
            <div class="text-slate-400 text-sm mb-1">Deskripsi</div>
            <div class="text-slate-800">{{ $workout->description ?? '-' }}</div>
        </div>
    </div>
</div>

{{-- Related Meals --}}
<div class="fade-in-delay-2">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold text-slate-800">Menu Makan — {{ $workout->day }}</h2>
        <a href="/meals/create" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-xl transition text-sm">
            <i data-lucide="plus" class="w-4 h-4"></i> Tambah Menu
        </a>
    </div>

    @if($workout->meals->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($workout->meals as $meal)
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="text-slate-500 text-xs font-semibold uppercase mb-2">{{ $meal->meal_type }}</div>
                    <h3 class="text-slate-800 font-semibold text-sm mb-2">{{ $meal->menu_name }}</h3>
                    <div class="grid grid-cols-3 gap-2 text-center border-t border-slate-100 pt-3">
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
                    <div class="flex gap-2 mt-3">
                        <a href="/meals/{{ $meal->id }}/edit" class="flex-1 text-center bg-blue-50 hover:bg-blue-100 text-blue-600 text-xs font-semibold py-1.5 rounded-lg transition">Edit</a>
                        <form action="/meals/{{ $meal->id }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')" class="w-full bg-red-50 hover:bg-red-100 text-red-500 text-xs font-semibold py-1.5 rounded-lg transition">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white border border-slate-200 rounded-2xl p-8 text-center text-slate-400 shadow-sm">
            Belum ada menu makan untuk hari ini.
        </div>
    @endif
</div>

@endsection