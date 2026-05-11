@props(['name' => null])

@php
    $class = $attributes->get('class', 'h-5 w-5');
    $stroke = 'stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"';
@endphp

@switch($name)
    @case('github')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="{{ $class }}" aria-hidden="true">
            <path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.56v-2c-3.2.7-3.88-1.36-3.88-1.36-.52-1.32-1.27-1.67-1.27-1.67-1.04-.71.08-.7.08-.7 1.15.08 1.76 1.18 1.76 1.18 1.02 1.75 2.68 1.25 3.34.95.1-.74.4-1.25.73-1.54-2.55-.29-5.24-1.28-5.24-5.69 0-1.26.45-2.29 1.18-3.1-.12-.29-.51-1.45.11-3.02 0 0 .96-.31 3.15 1.18a10.95 10.95 0 0 1 5.74 0c2.19-1.49 3.15-1.18 3.15-1.18.62 1.57.23 2.73.11 3.02.74.81 1.18 1.84 1.18 3.1 0 4.42-2.7 5.39-5.27 5.68.41.36.78 1.07.78 2.15v3.18c0 .31.21.68.8.56C20.21 21.39 23.5 17.08 23.5 12 23.5 5.65 18.35.5 12 .5z"/>
        </svg>
        @break

    @case('linkedin')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="{{ $class }}" aria-hidden="true">
            <path d="M20.45 20.45h-3.55v-5.57c0-1.33-.03-3.04-1.85-3.04-1.85 0-2.13 1.45-2.13 2.94v5.67H9.36V9h3.41v1.56h.05c.48-.9 1.65-1.85 3.4-1.85 3.64 0 4.31 2.4 4.31 5.51v6.23zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.12 20.45H3.56V9h3.56v11.45zM22.23 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.46c.98 0 1.77-.77 1.77-1.72V1.72C24 .77 23.21 0 22.23 0z"/>
        </svg>
        @break

    @case('x')
    @case('twitter')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="{{ $class }}" aria-hidden="true">
            <path d="M18.244 2H21l-6.52 7.45L22 22h-6.79l-4.74-6.2L4.8 22H2.04l6.96-7.95L2 2h6.91l4.29 5.66L18.244 2zm-2.39 18.18h1.86L7.27 3.74H5.31l10.54 16.44z"/>
        </svg>
        @break

    @case('mail')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" {!! $stroke !!} class="{{ $class }}" aria-hidden="true">
            <rect x="3" y="5" width="18" height="14" rx="2"/>
            <path d="m3 7 9 6 9-6"/>
        </svg>
        @break

    @case('phone')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" {!! $stroke !!} class="{{ $class }}" aria-hidden="true">
            <path d="M22 16.92V21a1 1 0 0 1-1.09 1A19 19 0 0 1 2 4.09 1 1 0 0 1 3 3h4.09a1 1 0 0 1 1 .75l1 4a1 1 0 0 1-.27 1l-2.2 2.2a16 16 0 0 0 6.43 6.43l2.2-2.2a1 1 0 0 1 1-.27l4 1a1 1 0 0 1 .75 1z"/>
        </svg>
        @break

    @case('map')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" {!! $stroke !!} class="{{ $class }}" aria-hidden="true">
            <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 1 1 18 0z"/>
            <circle cx="12" cy="10" r="3"/>
        </svg>
        @break

    @case('arrow-right')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" {!! $stroke !!} class="{{ $class }}" aria-hidden="true">
            <path d="M5 12h14"/><path d="m13 5 7 7-7 7"/>
        </svg>
        @break

    @case('external')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" {!! $stroke !!} class="{{ $class }}" aria-hidden="true">
            <path d="M14 3h7v7"/><path d="M10 14 21 3"/>
            <path d="M21 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5"/>
        </svg>
        @break

    @case('check')
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" {!! $stroke !!} class="{{ $class }}" aria-hidden="true">
            <path d="m5 12 5 5L20 7"/>
        </svg>
        @break

    @default
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="{{ $class }}" aria-hidden="true">
            <circle cx="12" cy="12" r="4"/>
        </svg>
@endswitch
