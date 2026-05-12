@props(['portfolio'])

@php $hero = $portfolio->hero; @endphp

<section id="top" class="relative overflow-hidden bg-hero-radial dark:bg-hero-radial-dark">
    <div class="container-page grid items-center gap-12 pb-20 pt-16 sm:pt-24 lg:grid-cols-12 lg:pb-28 lg:pt-28">

        <div class="lg:col-span-7 reveal">
            <p class="section-eyebrow">
                <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                {{ $hero['eyebrow'] ?? '' }}
            </p>

            <h1 class="mt-5 text-4xl font-extrabold leading-tight text-balance sm:text-5xl lg:text-6xl">
                {{ $hero['headline'] ?? $portfolio->fullName() }}
                <span class="block bg-gradient-to-r from-brand-600 via-brand-500 to-sky-500 bg-clip-text text-transparent">
                    {{ $portfolio->owner['role'] ?? '' }}
                </span>
            </h1>

            <p class="mt-6 max-w-2xl text-lg text-slate-600 sm:text-xl text-balance dark:text-slate-400">
                {{ $hero['subheadline'] ?? $portfolio->tagline() }}
            </p>

            <div class="mt-8 flex flex-wrap items-center gap-3">
                @if(! empty($hero['primary_cta']))
                    <a href="{{ $hero['primary_cta']['href'] }}" class="btn-primary">
                        {{ $hero['primary_cta']['label'] }}
                        <x-icon name="arrow-right" class="h-4 w-4" />
                    </a>
                @endif
                @if(! empty($hero['secondary_cta']))
                    <a href="{{ $hero['secondary_cta']['href'] }}" class="btn-secondary">
                        {{ $hero['secondary_cta']['label'] }}
                    </a>
                @endif
            </div>

            <dl class="mt-12 grid max-w-xl grid-cols-2 gap-4 sm:grid-cols-4">
                @foreach (($portfolio->about['highlights'] ?? []) as $stat)
                    <div class="rounded-2xl border border-slate-100 bg-white/70 px-4 py-3 text-center backdrop-blur dark:border-slate-700 dark:bg-slate-900/70">
                        <dt class="text-[11px] uppercase tracking-wider text-slate-500 dark:text-slate-400">{{ $stat['label'] }}</dt>
                        <dd class="mt-1 font-display text-xl font-bold text-brand-700">{{ $stat['value'] }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>

        <div class="lg:col-span-5 reveal">
            <div class="relative mx-auto aspect-square w-full max-w-md">
                <div class="absolute inset-0 -z-10 rounded-[40%] bg-gradient-to-br from-brand-200 via-brand-100 to-white blur-2xl dark:from-brand-900/40 dark:via-brand-950 dark:to-slate-950"></div>

                <div class="relative h-full w-full overflow-hidden rounded-[2.5rem] border border-white/60 bg-white/80 p-2 shadow-soft backdrop-blur dark:border-slate-700/60 dark:bg-slate-900/80">
                    <div class="flex h-full w-full items-center justify-center rounded-[2rem] bg-gradient-to-br from-brand-600 via-brand-500 to-sky-400 text-white">
                        @if(! empty($portfolio->owner['avatar']))
                            <img src="{{ $portfolio->owner['avatar'] }}" alt="{{ $portfolio->fullName() }}"
                                 class="h-full w-full rounded-[2rem] object-cover">
                        @else
                            <span class="font-display text-7xl font-bold tracking-tight animate-float">
                                {{ \Illuminate\Support\Str::of($portfolio->fullName())->explode(' ')->map(fn($w) => mb_substr($w, 0, 1))->join('') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="absolute -left-4 top-10 hidden rounded-2xl border border-slate-100 bg-white px-4 py-3 shadow-soft dark:border-slate-700 dark:bg-slate-900 sm:block">
                    <p class="text-[10px] uppercase tracking-wider text-slate-500 dark:text-slate-400">Hiện đang ở</p>
                    <p class="text-sm font-semibold text-slate-900 dark:text-slate-100">{{ $portfolio->owner['location'] ?? '' }}</p>
                </div>

                <div class="absolute -right-4 bottom-10 hidden rounded-2xl border border-slate-100 bg-white px-4 py-3 shadow-soft dark:border-slate-700 dark:bg-slate-900 sm:block">
                    <p class="text-[10px] uppercase tracking-wider text-slate-500 dark:text-slate-400">Sẵn sàng cho</p>
                    <p class="text-sm font-semibold text-brand-700">Dự án mới · 2026</p>
                </div>
            </div>
        </div>
    </div>
</section>
