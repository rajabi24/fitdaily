@extends('layouts.app')

@section('title', 'Tambah Menu Makan')

@section('content')

<div class="mb-10 fade-in">
    <a href="/meals" class="inline-flex items-center gap-1.5 text-slate-400 hover:text-blue-600 text-sm transition mb-4">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
    </a>
    <h1 class="text-4xl font-extrabold text-slate-800 mb-2">Tambah Menu Makan</h1>
    <p class="text-slate-500">Tambahkan menu makan baru ke jadwal harianmu.</p>
</div>

<div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm fade-in-delay-1">
    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-600 rounded-xl p-4 mb-6">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/meals" method="POST" class="space-y-6">
        @csrf

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Hari</label>
                <select name="day" class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:border-blue-400">
                    @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $day)
                        <option value="{{ $day }}" {{ old('day') == $day ? 'selected' : '' }}>{{ $day }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Waktu Makan</label>
                <select name="meal_type" class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:border-blue-400">
                    @foreach(['Sarapan','Makan Siang','Makan Malam','Snack'] as $type)
                        <option value="{{ $type }}" {{ old('meal_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Relasi Jadwal Latihan</label>
                <select name="workout_schedule_id" class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:border-blue-400">
                    <option value="">-- Pilih Hari Latihan --</option>
                    @foreach($workouts as $workout)
                        <option value="{{ $workout->id }}" {{ old('workout_schedule_id') == $workout->id ? 'selected' : '' }}>
                            {{ $workout->day }} — {{ $workout->exercise_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Menu</label>
                <input type="text" name="menu_name" value="{{ old('menu_name') }}" placeholder="Contoh: Nasi Merah + Ayam" class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:border-blue-400">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Kalori (kkal)</label>
                <input type="number" name="calories" value="{{ old('calories', 0) }}" class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:border-blue-400">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Protein</label>
                <input type="text" name="protein" value="{{ old('protein') }}" placeholder="Contoh: 30g" class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:border-blue-400">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Karbohidrat</label>
                <input type="text" name="carbs" value="{{ old('carbs') }}" placeholder="Contoh: 45g" class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:border-blue-400">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
                <textarea name="description" rows="3" placeholder="Catatan tambahan..." class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:border-blue-400">{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl transition">
                <i data-lucide="save" class="w-4 h-4"></i> Simpan
            </button>
            <a href="/meals" class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold px-8 py-3 rounded-xl transition">
                Batal
            </a>
        </div>
    </form>
</div>

@endsection