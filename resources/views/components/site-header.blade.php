@props(['portfolio'])

@php
    $links = [
        ['label' => 'Giới thiệu', 'href' => '#about'],
        ['label' => 'Kỹ năng',    'href' => '#skills'],
        ['label' => 'Dự án',      'href' => '#projects'],
        ['label' => 'Kinh nghiệm','href' => '#experience'],
        ['label' => 'Liên hệ',    'href' => '#contact'],
    ];
@endphp

<header class="sticky top-0 z-40 border-b border-slate-100 bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/65">
    <div class="container-page flex h-16 items-center justify-between">

        <a href="{{ route('portfolio.index') }}" class="flex items-center gap-2 font-display text-lg font-bold tracking-tight text-slate-900">
            <span class="grid h-9 w-9 place-items-center rounded-xl bg-brand-600 text-white shadow-soft">
                {{ \Illuminate\Support\Str::of($portfolio->fullName())->explode(' ')->map(fn($w) => mb_substr($w, 0, 1))->join('') }}
            </span>
            <span>{{ $portfolio->fullName() }}</span>
        </a>

        <nav class="hidden items-center gap-1 md:flex" aria-label="Điều hướng chính">
            @foreach ($links as $link)
                <a href="{{ $link['href'] }}"
                   class="rounded-full px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-brand-50 hover:text-brand-700">
                    {{ $link['label'] }}
                </a>
            @endforeach
            @if(! empty($portfolio->owner['resume_url']))
                <a href="{{ $portfolio->owner['resume_url'] }}" class="ml-2 btn-primary">
                    Tải CV
                </a>
            @else
                <a href="#contact" class="ml-2 btn-primary">Tuyển dụng tôi</a>
            @endif
        </nav>

        <button type="button"
                data-mobile-nav-toggle
                aria-controls="mobile-nav"
                aria-expanded="false"
                class="inline-flex h-10 w-10 items-center justify-center rounded-lg text-slate-700 hover:bg-slate-100 md:hidden">
            <span class="sr-only">Mở menu</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
            </svg>
        </button>
    </div>

    <nav id="mobile-nav"
         data-mobile-nav
         aria-label="Điều hướng di động"
         class="md:hidden hidden border-t border-slate-100 bg-white">
        <div class="container-page flex flex-col gap-1 py-3">
            @foreach ($links as $link)
                <a href="{{ $link['href'] }}"
                   class="rounded-lg px-3 py-2 text-base font-medium text-slate-700 hover:bg-brand-50 hover:text-brand-700">
                    {{ $link['label'] }}
                </a>
            @endforeach
            @if(! empty($portfolio->owner['resume_url']))
                <a href="{{ $portfolio->owner['resume_url'] }}" class="mt-2 btn-primary">Tải CV</a>
            @else
                <a href="#contact" class="mt-2 btn-primary">Tuyển dụng tôi</a>
            @endif
        </div>
    </nav>
</header>

<style>
    [data-mobile-nav].open { display: block; }
</style>
