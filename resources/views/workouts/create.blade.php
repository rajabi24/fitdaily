@extends('layouts.app')

@section('title', 'Tambah Latihan')

@section('content')

<div class="mb-10 fade-in">
    <a href="/workouts" class="inline-flex items-center gap-1.5 text-slate-400 hover:text-blue-600 text-sm transition mb-4">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali
    </a>
    <h1 class="text-4xl font-extrabold text-slate-800 mb-2">Tambah Jadwal Latihan</h1>
    <p class="text-slate-500">Tambahkan jadwal latihan baru ke program mingguanmu.</p>
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

    <form action="/workouts" method="POST" class="space-y-6">
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
                <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori</label>
                <select name="category" class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:border-blue-400">
                    @foreach(['Gym','Running','Rest'] as $cat)
                        <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Latihan</label>
                <input type="text" name="exercise_name" value="{{ old('exercise_name') }}" placeholder="Contoh: Chest, Shoulder, Tricep" class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:border-blue-400">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Durasi (menit)</label>
                <input type="number" name="duration" value="{{ old('duration', 0) }}" class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:border-blue-400">
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Intensitas</label>
                <select name="intensity" class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:border-blue-400">
                    @foreach(['Ringan','Sedang','Berat','-'] as $intensity)
                        <option value="{{ $intensity }}" {{ old('intensity') == $intensity ? 'selected' : '' }}>{{ $intensity }}</option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
                <textarea name="description" rows="3" placeholder="Deskripsi latihan..." class="w-full border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:outline-none focus:border-blue-400">{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <button type="submit" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl transition">
                <i data-lucide="save" class="w-4 h-4"></i> Simpan
            </button>
            <a href="/workouts" class="inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold px-8 py-3 rounded-xl transition">
                Batal
            </a>
        </div>
    </form>
</div>

@endsection