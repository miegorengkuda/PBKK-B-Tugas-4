@extends('layouts.app')

@section('title', 'Profil Mahasiswa')

@section('content')

    {{-- Alert Status Interaktif (Challenge 2) --}}
    @if ($status)
        <x-status-alert :type="$status">
            @switch($status)
                @case('success')
                    Profil berhasil dimuat.
                    @break
                @case('info')
                    Berikut adalah informasi profil mahasiswa.
                    @break
                @case('warning')
                    Data profil mungkin belum diperbarui.
                    @break
            @endswitch
        </x-status-alert>
    @endif

    {{-- Header --}}
    <header class="border-b border-slate-200 dark:border-slate-700 pb-6 mb-8">
        <h1 class="text-3xl font-black tracking-tight text-gray-900 dark:text-gray-100 mb-2">Profil Mahasiswa</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400">Informasi akademik lengkap.</p>
    </header>

    <div class="grid md:grid-cols-5 gap-10">

        {{-- Data Profil — 3 col --}}
        <section class="md:col-span-3 space-y-3">
            <h2 class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-1">Data Akademik</h2>

            <x-info-card title="Nama Lengkap" :value="$mahasiswa['nama']" />
            <x-info-card title="NRP">
                <span class="font-mono font-semibold text-its dark:text-blue-400">{{ $mahasiswa['nrp'] }}</span>
            </x-info-card>
            <x-info-card title="Program Studi" :value="$mahasiswa['prodi']" />
            <x-info-card title="Fakultas" :value="$mahasiswa['fakultas']" />
            <x-info-card title="Kampus" :value="$mahasiswa['kampus']" />
            <x-info-card title="Angkatan">
                <span class="font-mono">{{ $mahasiswa['angkatan'] }}</span>
            </x-info-card>
            <x-info-card title="Semester">
                <span class="font-mono">{{ $mahasiswa['semester'] }}</span>
            </x-info-card>
            <x-info-card title="Email">
                <span class="font-mono text-its dark:text-blue-400">{{ $mahasiswa['email'] }}</span>
            </x-info-card>
            <x-info-card title="Minat / Bidang" :value="$mahasiswa['minat']" />
        </section>

        {{-- Sidebar — 2 col --}}
        <aside class="md:col-span-2 space-y-6">
            {{-- Deskripsi --}}
            <div>
                <h2 class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-3">Tentang</h2>
                <div class="border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 py-3">
                    <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">{{ $mahasiswa['deskripsi'] }}</p>
                </div>
            </div>

            {{-- Mata Kuliah --}}
            <div>
                <h2 class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-3">Mata Kuliah Semester Ini</h2>
                <div class="border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 divide-y divide-slate-100 dark:divide-slate-700">
                    @foreach ($mahasiswa['matakuliah'] as $index => $mk)
                        <div class="flex items-center gap-3 px-4 py-2.5">
                            <span class="font-mono text-xs text-gray-300 dark:text-gray-600 w-5 text-right">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <span class="text-sm text-gray-800 dark:text-gray-200">{{ $mk }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Test Alert Links --}}
            <div>
                <h2 class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-3">Test Alert Status</h2>
                <div class="border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 divide-y divide-slate-100 dark:divide-slate-700">
                    <a href="{{ route('profile', array_merge(request()->only('theme'), ['status' => 'success'])) }}"
                       class="block px-4 py-2.5 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-700 transition">
                        ?status=<span class="font-mono text-green-600 dark:text-green-400">success</span>
                    </a>
                    <a href="{{ route('profile', array_merge(request()->only('theme'), ['status' => 'info'])) }}"
                       class="block px-4 py-2.5 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-700 transition">
                        ?status=<span class="font-mono text-blue-600 dark:text-blue-400">info</span>
                    </a>
                    <a href="{{ route('profile', array_merge(request()->only('theme'), ['status' => 'warning'])) }}"
                       class="block px-4 py-2.5 text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-slate-700 transition">
                        ?status=<span class="font-mono text-yellow-600 dark:text-yellow-400">warning</span>
                    </a>
                </div>
            </div>
        </aside>

    </div>

@endsection
