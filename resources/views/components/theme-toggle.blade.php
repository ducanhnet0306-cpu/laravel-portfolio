@props([])

<button
    type="button"
    data-theme-toggle
    role="switch"
    aria-checked="false"
    title="Chuyển chế độ sáng / tối"
    aria-label="Chuyển giao diện sáng hoặc tối"
    {{ $attributes->class([
        'theme-toggle group relative h-9 w-16 shrink-0 overflow-hidden rounded-full p-1',
        'ring-1 ring-slate-200/90 transition hover:brightness-[1.02] active:brightness-95',
        'dark:ring-slate-600/70 dark:hover:brightness-110',
        'focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-500 focus-visible:ring-offset-2 dark:focus-visible:ring-offset-slate-950',
    ]) }}
>
    {{-- Nền ban ngày: trời xanh + mây --}}
    <span
        class="pointer-events-none absolute inset-1 rounded-full bg-gradient-to-br from-sky-300 via-sky-400 to-blue-500 transition-opacity duration-300 dark:opacity-0"
        aria-hidden="true"
    ></span>
    <svg
        class="pointer-events-none absolute inset-1 h-[calc(100%-0.5rem)] w-[calc(100%-0.5rem)] translate-x-px translate-y-px text-white/95 transition-opacity duration-300 dark:opacity-0"
        viewBox="0 0 64 28"
        preserveAspectRatio="xMidYMid meet"
        aria-hidden="true"
    >
        <ellipse cx="48" cy="20" rx="14" ry="7" fill="currentColor" />
        <ellipse cx="36" cy="22" rx="9" ry="5" fill="currentColor" opacity="0.92" />
        <ellipse cx="56" cy="18" rx="7" ry="3.5" fill="currentColor" opacity="0.88" />
        <ellipse cx="22" cy="9" rx="5" ry="2.8" fill="currentColor" opacity="0.55" />
    </svg>

    {{-- Nền ban đêm: chuyển sắc + sao --}}
    <span
        class="pointer-events-none absolute inset-1 rounded-full bg-gradient-to-br from-slate-950 via-indigo-950 to-slate-900 opacity-0 transition-opacity duration-300 dark:opacity-100"
        aria-hidden="true"
    ></span>
    <span
        class="pointer-events-none absolute inset-1 opacity-0 transition-opacity duration-300 dark:opacity-100"
        aria-hidden="true"
    >
        <span class="absolute left-[12%] top-[28%] h-0.5 w-0.5 rounded-full bg-white shadow-[0_0_3px_rgba(255,255,255,0.95)]"></span>
        <span class="absolute left-[28%] top-[18%] h-1 w-1 rounded-full bg-amber-100/90 shadow-[0_0_4px_rgba(254,243,199,0.9)]"></span>
        <span class="absolute left-[42%] top-[32%] h-0.5 w-0.5 rounded-full bg-white shadow-[0_0_2px_rgba(255,255,255,0.9)]"></span>
        <span class="absolute left-[55%] top-[14%] h-0.5 w-0.5 rounded-full bg-white/90"></span>
        <span class="absolute left-[68%] top-[26%] h-0.5 w-0.5 rounded-full bg-sky-100/80 shadow-[0_0_2px_rgba(224,242,254,0.8)]"></span>
        <span class="absolute left-[78%] top-[38%] h-px w-px rounded-full bg-white"></span>
        <span class="absolute left-[18%] top-[48%] h-0.5 w-0.5 rounded-full bg-white/80"></span>
        <span class="absolute left-[62%] top-[48%] h-0.5 w-0.5 rounded-full bg-amber-50/90"></span>
    </span>

    {{-- Nút trượt: sáng = mặt trời vàng cam; tối = trăng khuyết vàng --}}
    <span
        class="pointer-events-none absolute left-1 top-1/2 z-20 flex h-7 w-7 -translate-y-1/2 translate-x-0 items-center justify-center rounded-full bg-white shadow-md ring-1 ring-black/[0.07] transition-transform duration-300 ease-[cubic-bezier(0.34,1.45,0.64,1)] dark:translate-x-7 dark:bg-slate-800 dark:ring-white/12"
    >
        <span class="flex dark:hidden" aria-hidden="true">
            <svg viewBox="0 0 24 24" class="h-[18px] w-[18px]" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="4.2" fill="#fbbf24" />
                <g stroke="#d97706" stroke-width="1.65" stroke-linecap="round">
                    <path d="M12 2.25v2.2M12 19.55v2.2M2.25 12h2.2M19.55 12h2.2" />
                    <path d="M4.4 4.4 6.1 6.1M17.9 17.9l1.7 1.7M4.4 19.6 6.1 17.9M17.9 6.1l1.7-1.7" />
                </g>
            </svg>
        </span>
        <span class="hidden dark:flex" aria-hidden="true">
            <svg viewBox="0 0 24 24" class="h-[18px] w-[18px]" xmlns="http://www.w3.org/2000/svg">
                <path
                    fill="#fde047"
                    d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"
                />
            </svg>
        </span>
    </span>
</button>
