<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#2563eb">

    <title>{{ $title ?? ($portfolio->fullName().' — '.$portfolio->tagline()) }}</title>
    <meta name="description" content="{{ $description ?? $portfolio->tagline() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? $portfolio->fullName() }}">
    <meta property="og:description" content="{{ $description ?? $portfolio->tagline() }}">
    <meta property="og:url" content="{{ url()->current() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen antialiased">

    <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-50 focus:rounded-md focus:bg-brand-600 focus:px-3 focus:py-2 focus:text-white">
        Bỏ qua tới nội dung chính
    </a>

    <x-site-header :portfolio="$portfolio" />

    <main id="main">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <x-site-footer :portfolio="$portfolio" />

</body>
</html>
