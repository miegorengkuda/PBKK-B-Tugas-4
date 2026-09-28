@extends('layouts.app')

@section('title', 'Kalkulator IPK')

@section('content')

    {{-- Breadcrumb --}}
    <nav class="text-xs font-mono text-gray-400 dark:text-gray-500 mb-8">
        <a href="{{ route('home', request()->only('theme')) }}" class="hover:text-its dark:hover:text-blue-400 transition">Home</a>
        <span class="mx-1.5">/</span>
        <span>Dashboard</span>
        <span class="mx-1.5">/</span>
        <span class="text-gray-600 dark:text-gray-400">Kalkulator IPK</span>
    </nav>

    {{-- Header --}}
    <header class="border-b border-slate-200 dark:border-slate-700 pb-6 mb-8">
        <h1 class="text-3xl font-black tracking-tight text-gray-900 dark:text-gray-100 mb-2">Kalkulator IPK</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400">Perhitungan rata-rata Indeks Prestasi dari dua semester.</p>
    </header>

    <div class="grid md:grid-cols-5 gap-10">

        {{-- Metrik Utama — 3 col --}}
        <section class="md:col-span-3">
            <h2 class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-4">Data Perhitungan</h2>
            <div class="border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-slate-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-800/50">
                            <th class="px-4 py-2.5 text-left text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-wider">Metrik</th>
                            <th class="px-4 py-2.5 text-right text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-wider">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-slate-100 dark:border-slate-700">
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-400 font-medium">IP Semester 1</td>
                            <td class="px-4 py-3 text-right font-mono font-semibold text-gray-900 dark:text-gray-100">{{ number_format($ip1, 2) }}</td>
                        </tr>
                        <tr class="border-b border-slate-100 dark:border-slate-700">
                            <td class="px-4 py-3 text-gray-600 dark:text-gray-400 font-medium">IP Semester 2</td>
                            <td class="px-4 py-3 text-right font-mono font-semibold text-gray-900 dark:text-gray-100">{{ number_format($ip2, 2) }}</td>
                        </tr>
                        <tr class="border-b border-slate-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-800/50">
                            <td class="px-4 py-3 text-gray-500 dark:text-gray-400 font-medium">Total IP</td>
                            <td class="px-4 py-3 text-right font-mono font-semibold text-gray-700 dark:text-gray-300">{{ number_format($total, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-4 text-gray-900 dark:text-gray-100 font-bold">Rata-rata IPK</td>
                            <td class="px-4 py-4 text-right font-mono font-black text-2xl text-its dark:text-blue-400">{{ number_format($rata, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        {{-- Predikat & Link — 2 col --}}
        <aside class="md:col-span-2 space-y-8">
            {{-- Predikat --}}
            <div>
                <h2 class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-4">Predikat</h2>
                <div class="border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 px-5 py-5">
                    <div class="text-center">
                        <span class="inline-block px-3 py-1 text-xs font-mono font-bold uppercase tracking-wider
                            @if($predikat === 'Cum Laude') bg-green-50 text-green-700 border border-green-200 dark:bg-green-900/20 dark:border-green-800 dark:text-green-300
                            @elseif($predikat === 'Sangat Memuaskan') bg-blue-50 text-its border border-blue-200 dark:bg-blue-900/20 dark:border-blue-800 dark:text-blue-300
                            @elseif($predikat === 'Memuaskan') bg-yellow-50 text-yellow-700 border border-yellow-200 dark:bg-yellow-900/20 dark:border-yellow-800 dark:text-yellow-300
                            @elseif($predikat === 'Cukup') bg-orange-50 text-orange-700 border border-orange-200 dark:bg-orange-900/20 dark:border-orange-800 dark:text-orange-300
                            @else bg-red-50 text-red-700 border border-red-200 dark:bg-red-900/20 dark:border-red-800 dark:text-red-300
                            @endif">
                            {{ $predikat }}
                        </span>
                        <p class="text-xs text-gray-400 dark:text-gray-500 mt-3 font-mono">IPK {{ number_format($rata, 2) }} / 4.00</p>
                    </div>

                    {{-- Scale --}}
                    <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-700">
                        <div class="space-y-1 text-xs text-gray-400 dark:text-gray-500">
                            <div class="flex justify-between"><span>≥ 3.50</span><span>Cum Laude</span></div>
                            <div class="flex justify-between"><span>≥ 3.00</span><span>Sangat Memuaskan</span></div>
                            <div class="flex justify-between"><span>≥ 2.50</span><span>Memuaskan</span></div>
                            <div class="flex justify-between"><span>≥ 2.00</span><span>Cukup</span></div>
                            <div class="flex justify-between"><span>&lt; 2.00</span><span>Kurang</span></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contoh Perhitungan Lain --}}
            <div>
                <h2 class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-4">Coba Nilai Lain</h2>
                <div class="border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 divide-y divide-slate-100 dark:divide-slate-700">
                    <a href="{{ route('ipk.kalkulator', array_merge(['ip1' => '4.00', 'ip2' => '3.90'], request()->only('theme'))) }}"
                       class="flex items-center justify-between px-4 py-3 hover:bg-gray-50 dark:hover:bg-slate-700 transition text-sm group">
                        <span class="font-mono text-gray-600 dark:text-gray-300">4.00 &amp; 3.90</span>
                        <span class="text-xs text-gray-400 group-hover:text-its dark:group-hover:text-blue-400 transition">Cum Laude &rarr;</span>
                    </a>
                    <a href="{{ route('ipk.kalkulator', array_merge(['ip1' => '3.25', 'ip2' => '3.10'], request()->only('theme'))) }}"
                       class="flex items-center justify-between px-4 py-3 hover:bg-gray-50 dark:hover:bg-slate-700 transition text-sm group">
                        <span class="font-mono text-gray-600 dark:text-gray-300">3.25 &amp; 3.10</span>
                        <span class="text-xs text-gray-400 group-hover:text-its dark:group-hover:text-blue-400 transition">Sangat Memuaskan &rarr;</span>
                    </a>
                    <a href="{{ route('ipk.kalkulator', array_merge(['ip1' => '2.75', 'ip2' => '2.60'], request()->only('theme'))) }}"
                       class="flex items-center justify-between px-4 py-3 hover:bg-gray-50 dark:hover:bg-slate-700 transition text-sm group">
                        <span class="font-mono text-gray-600 dark:text-gray-300">2.75 &amp; 2.60</span>
                        <span class="text-xs text-gray-400 group-hover:text-its dark:group-hover:text-blue-400 transition">Memuaskan &rarr;</span>
                    </a>
                </div>
            </div>

            {{-- Named Route Info --}}
            <div class="border-l-2 border-its dark:border-blue-400 pl-4">
                <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
                    <span class="font-semibold text-gray-700 dark:text-gray-300">Named Route</span><br>
                    <code class="bg-gray-100 dark:bg-slate-800 px-1.5 py-0.5 text-xs font-mono text-gray-600 dark:text-gray-300">route('ipk.kalkulator', ['ip1' => '{{ $ip1 }}', 'ip2' => '{{ $ip2 }}'])</code>
                </p>
            </div>
        </aside>

    </div>

@endsection
