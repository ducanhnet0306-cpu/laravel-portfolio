@props(['portfolio'])

<footer class="border-t border-slate-100 bg-white dark:border-slate-800 dark:bg-slate-950">
    <div class="container-page grid gap-10 py-12 md:grid-cols-3">

        <div>
            <p class="font-display text-lg font-bold text-slate-900 dark:text-slate-50">{{ $portfolio->fullName() }}</p>
            <p class="mt-2 max-w-xs text-sm text-slate-600 dark:text-slate-400">{{ $portfolio->tagline() }}</p>
        </div>

        <div>
            <p class="text-sm font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Liên kết</p>
            <ul class="mt-4 space-y-2 text-sm">
                <li><a href="#about"      class="text-slate-700 hover:text-brand-700 dark:text-slate-300 dark:hover:text-brand-400">Giới thiệu</a></li>
                <li><a href="#projects"   class="text-slate-700 hover:text-brand-700 dark:text-slate-300 dark:hover:text-brand-400">Dự án</a></li>
                <li><a href="#experience" class="text-slate-700 hover:text-brand-700 dark:text-slate-300 dark:hover:text-brand-400">Kinh nghiệm</a></li>
                <li><a href="#contact"    class="text-slate-700 hover:text-brand-700 dark:text-slate-300 dark:hover:text-brand-400">Liên hệ</a></li>
            </ul>
        </div>

        <div>
            <p class="text-sm font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Kết nối</p>
            <ul class="mt-4 flex flex-wrap gap-2">
                @foreach ($portfolio->socials as $social)
                    <li>
                        <a href="{{ $social->url }}"
                           target="_blank" rel="noopener"
                           class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-1.5 text-sm text-slate-700 transition hover:border-brand-400 hover:text-brand-700 dark:border-slate-600 dark:bg-slate-900 dark:text-slate-300 dark:hover:border-brand-500 dark:hover:text-brand-400">
                            <x-icon :name="$social->icon" class="h-4 w-4" />
                            <span>{{ $social->label }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="border-t border-slate-100 dark:border-slate-800">
        <div class="container-page flex flex-col items-center justify-between gap-2 py-5 text-xs text-slate-500 dark:text-slate-400 sm:flex-row">
            <p>© {{ date('Y') }} {{ $portfolio->fullName() }}. Bảo lưu mọi quyền.</p>
            <p>Xây dựng với <span class="text-brand-600">♥</span> bằng Laravel & Tailwind CSS.</p>
        </div>
    </div>
</footer>
