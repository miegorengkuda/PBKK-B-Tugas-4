@props(['title', 'value' => null])

<div {{ $attributes->merge(['class' => 'border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800']) }}>
    <dt class="px-4 py-2.5 text-xs font-mono text-gray-400 dark:text-gray-500 uppercase tracking-widest border-b border-slate-200 dark:border-slate-700 bg-gray-50 dark:bg-slate-800/50">
        {{ $title }}
    </dt>
    <dd class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
        @if ($value)
            {{ $value }}
        @else
            {{ $slot }}
        @endif
    </dd>
</div>
