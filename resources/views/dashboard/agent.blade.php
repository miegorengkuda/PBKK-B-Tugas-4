@extends('layouts.app')

@section('title', 'Agent AI — ' . $tema)

@section('content')

    {{-- Breadcrumb --}}
    <nav class="text-xs font-mono text-gray-400 dark:text-gray-500 mb-8">
        <a href="{{ route('home', request()->only('theme')) }}" class="hover:text-its dark:hover:text-blue-400 transition">Home</a>
        <span class="mx-1.5">/</span>
        <span>Dashboard</span>
        <span class="mx-1.5">/</span>
        <span class="text-gray-600 dark:text-gray-400">Agent AI</span>
    </nav>

    {{-- Header --}}
    <header class="border-b border-slate-200 dark:border-slate-700 pb-6 mb-8">
        <h1 class="text-3xl font-black tracking-tight text-gray-900 dark:text-gray-100 mb-2">Ide Agentic AI</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400">Konsep agen AI otonom untuk kebutuhan akademik mahasiswa ITS.</p>
    </header>

    {{-- Theme Label --}}
    <h2 class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-5">Tema: {{ $tema }}</h2>

    {{-- Idea Card --}}
    <div class="border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 mb-8">
        {{-- Title --}}
        <div class="px-5 py-4 border-b border-slate-200 dark:border-slate-700">
            <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">{{ $tema }}</h3>
        </div>

        {{-- Details --}}
        <div class="grid md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-slate-200 dark:divide-slate-700">
            <div class="px-5 py-4">
                <dt class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-2">Deskripsi</dt>
                <dd class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">{{ $idea['deskripsi'] }}</dd>
            </div>
            <div class="px-5 py-4">
                <dt class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-2">Use Case</dt>
                <dd class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">{{ $idea['use_case'] }}</dd>
            </div>
        </div>

        {{-- Tech Stack --}}
        <div class="px-5 py-4 border-t border-slate-200 dark:border-slate-700">
            <dt class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-2">Stack Teknologi</dt>
            <dd class="flex flex-wrap gap-1.5">
                @foreach ($idea['teknologi'] as $tech)
                    <span class="inline-block px-2 py-1 text-xs font-mono text-gray-600 dark:text-gray-300 bg-gray-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600">
                        {{ $tech }}
                    </span>
                @endforeach
            </dd>
        </div>

        {{-- Architecture Flow --}}
        <div class="px-5 py-4 border-t border-slate-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-800/50">
            <dt class="text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest mb-2">Alur Arsitektur</dt>
            <dd class="text-sm font-mono text-gray-600 dark:text-gray-400 leading-relaxed">{{ $idea['arsitektur'] }}</dd>
        </div>
    </div>

    {{-- Named Route Info --}}
    <div class="border-l-2 border-its dark:border-blue-400 pl-4">
        <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
            <span class="font-semibold text-gray-700 dark:text-gray-300">Named Route</span><br>
            <code class="bg-gray-100 dark:bg-slate-800 px-1.5 py-0.5 text-xs font-mono text-gray-600 dark:text-gray-300">route('agent.idea')</code>
            atau
            <code class="bg-gray-100 dark:bg-slate-800 px-1.5 py-0.5 text-xs font-mono text-gray-600 dark:text-gray-300">route('agent.idea', 'tema')</code><br>
            Parameter <code class="bg-gray-100 dark:bg-slate-800 px-1.5 py-0.5 text-xs font-mono text-gray-600 dark:text-gray-300">{tema?}</code> bersifat opsional — default ke <em>General Assistant Agent</em>.
        </p>
    </div>

@endsection
