@extends('layouts.app')

@section('title', 'Ide Agentic AI')

@section('content')

    {{-- Header --}}
    <header class="border-b border-slate-200 dark:border-slate-700 pb-6 mb-8">
        <h1 class="text-3xl font-black tracking-tight text-gray-900 dark:text-gray-100 mb-2">Ide Agentic AI</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400">Proposal mini project agent AI untuk kebutuhan akademik.</p>
    </header>

    <div class="grid md:grid-cols-5 gap-10">

        {{-- Konten Utama — 3 col --}}
        <section class="md:col-span-3 space-y-3">
            <h2 class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-1">Project Proposal</h2>

            <x-info-card title="Nama Project" :value="$idea['nama']" />

            <x-info-card title="Masalah">
                <p class="leading-relaxed">{{ $idea['masalah'] }}</p>
            </x-info-card>

            <x-info-card title="Tujuan">
                <p class="leading-relaxed">{{ $idea['tujuan'] }}</p>
            </x-info-card>

            <x-info-card title="Solusi">
                <p class="leading-relaxed">{{ $idea['solusi'] }}</p>
            </x-info-card>

            <x-info-card title="Cara Kerja">
                <p class="font-mono text-xs leading-relaxed text-gray-600 dark:text-gray-400">{{ $idea['cara_kerja'] }}</p>
            </x-info-card>
        </section>

        {{-- Sidebar — 2 col --}}
        <aside class="md:col-span-2 space-y-6">
            {{-- Teknologi --}}
            <div>
                <h2 class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-3">Stack Teknologi</h2>
                <div class="border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 py-3">
                    <div class="flex flex-wrap gap-1.5">
                        @foreach ($idea['teknologi'] as $tech)
                            <span class="inline-block px-2 py-1 text-xs font-mono text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600">
                                {{ $tech }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Target --}}
            <div>
                <h2 class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-3">Target Pengembangan</h2>
                <div class="border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 py-3">
                    <p class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">{{ $idea['target'] }}</p>
                </div>
            </div>
        </aside>

    </div>

@endsection
