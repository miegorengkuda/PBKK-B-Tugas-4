@extends('layouts.app')

@section('title', 'Home')

@section('content')

    {{-- Header --}}
    <header class="border-b border-slate-200 dark:border-slate-700 pb-8 mb-10">
        <p class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-3">Institut Teknologi Sepuluh Nopember</p>
        <h1 class="text-4xl font-black leading-tight tracking-tight text-gray-900 dark:text-gray-100 mb-3">
            Profil Akademik Mahasiswa
        </h1>
        <p class="text-lg text-gray-500 dark:text-gray-400 max-w-xl leading-relaxed">
            Mini-website profil akademik pribadi — Tugas Praktikum PBKK (B).
        </p>
    </header>

    <div class="grid md:grid-cols-5 gap-10">

        {{-- Profil Singkat — 3 col --}}
        <section class="md:col-span-3">
            <h2 class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-4">Profil Singkat</h2>
            <div class="border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                <table class="w-full text-sm">
                    <tbody>
                        <tr class="border-b border-slate-100 dark:border-slate-700">
                            <td class="px-4 py-3 text-gray-400 dark:text-gray-500 font-medium w-36">Nama</td>
                            <td class="px-4 py-3 font-semibold text-gray-900 dark:text-gray-100">{{ $profil['nama'] }}</td>
                        </tr>
                        <tr class="border-b border-slate-100 dark:border-slate-700">
                            <td class="px-4 py-3 text-gray-400 dark:text-gray-500 font-medium">NRP</td>
                            <td class="px-4 py-3 font-mono font-semibold text-its dark:text-blue-400">{{ $profil['nrp'] }}</td>
                        </tr>
                        <tr class="border-b border-slate-100 dark:border-slate-700">
                            <td class="px-4 py-3 text-gray-400 dark:text-gray-500 font-medium">Program Studi</td>
                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $profil['jurusan'] }}</td>
                        </tr>
                        <tr class="border-b border-slate-100 dark:border-slate-700">
                            <td class="px-4 py-3 text-gray-400 dark:text-gray-500 font-medium">Fakultas</td>
                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $profil['fakultas'] }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 text-gray-400 dark:text-gray-500 font-medium">Kampus</td>
                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $profil['kampus'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <a href="{{ route('profile', request()->only('theme')) }}"
                   class="inline-block text-sm font-semibold text-its dark:text-blue-400 hover:underline">
                    Lihat profil lengkap &rarr;
                </a>
            </div>
        </section>

        {{-- Navigasi — 2 col --}}
        <aside class="md:col-span-2">
            <h2 class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-4">Halaman</h2>
            <div class="border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 divide-y divide-slate-100 dark:divide-slate-700">
                <a href="{{ route('profile', request()->only('theme')) }}" class="flex items-center justify-between px-4 py-3 hover:bg-gray-50 dark:hover:bg-slate-700 transition group">
                    <span class="text-sm font-medium text-gray-900 dark:text-gray-100">Profil Mahasiswa</span>
                    <span class="text-xs font-mono text-gray-400 group-hover:text-its dark:group-hover:text-blue-400 transition">&rarr;</span>
                </a>
                <a href="{{ route('agent', request()->only('theme')) }}" class="flex items-center justify-between px-4 py-3 hover:bg-gray-50 dark:hover:bg-slate-700 transition group">
                    <span class="text-sm font-medium text-gray-900 dark:text-gray-100">Ide Agentic AI</span>
                    <span class="text-xs font-mono text-gray-400 group-hover:text-its dark:group-hover:text-blue-400 transition">&rarr;</span>
                </a>
                <a href="{{ route('ipk.kalkulator', array_merge(['ip1' => '3.50', 'ip2' => '3.45'], request()->only('theme'))) }}" class="flex items-center justify-between px-4 py-3 hover:bg-gray-50 dark:hover:bg-slate-700 transition group">
                    <span class="text-sm font-medium text-gray-900 dark:text-gray-100">Kalkulator IP</span>
                    <span class="text-xs font-mono text-gray-400 group-hover:text-its dark:group-hover:text-blue-400 transition">&rarr;</span>
                </a>
            </div>
        </aside>

    </div>

@endsection
