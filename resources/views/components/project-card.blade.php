@props(['project'])

<article {{ $attributes->merge(['class' => 'card group']) }}>
    <div class="flex items-start justify-between gap-4">
        <h3 class="font-display text-lg font-bold leading-snug text-slate-900 group-hover:text-brand-700 dark:text-slate-50 dark:group-hover:text-brand-400">
            {{ $project->title }}
        </h3>
        @if($project->featured)
            <span class="shrink-0 rounded-full bg-amber-100 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wider text-amber-700 dark:bg-amber-950/60 dark:text-amber-300">
                Nổi bật
            </span>
        @endif
    </div>

    <p class="mt-3 text-sm leading-relaxed text-slate-600 dark:text-slate-400">
        {{ $project->description }}
    </p>

    <ul class="mt-5 flex flex-wrap gap-1.5">
        @foreach ($project->tags as $tag)
            <li><span class="tag">{{ $tag }}</span></li>
        @endforeach
    </ul>

    @if($project->hasLinks())
        <div class="mt-6 flex flex-wrap items-center gap-2 border-t border-slate-100 pt-4 dark:border-slate-800">
            @if($project->liveUrl)
                <a href="{{ $project->liveUrl }}" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-1.5 text-xs font-semibold text-brand-700 hover:text-brand-900 dark:text-brand-400 dark:hover:text-brand-300">
                    Xem live
                    <x-icon name="external" class="h-3.5 w-3.5" />
                </a>
            @endif
            @if($project->repoUrl)
                <span class="text-slate-300 dark:text-slate-600">·</span>
                <a href="{{ $project->repoUrl }}" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-600 hover:text-brand-700 dark:text-slate-400 dark:hover:text-brand-400">
                    Mã nguồn
                    <x-icon name="github" class="h-3.5 w-3.5" />
                </a>
            @endif
            <a href="{{ route('portfolio.project.show', $project->slug()) }}"
               class="ml-auto inline-flex items-center gap-1 text-xs font-semibold text-slate-500 hover:text-brand-700 dark:text-slate-400 dark:hover:text-brand-400">
                Chi tiết
                <x-icon name="arrow-right" class="h-3.5 w-3.5" />
            </a>
        </div>
    @else
        <div class="mt-6 flex items-center justify-end border-t border-slate-100 pt-4 dark:border-slate-800">
            <a href="{{ route('portfolio.project.show', $project->slug()) }}"
               class="inline-flex items-center gap-1 text-xs font-semibold text-slate-500 hover:text-brand-700 dark:text-slate-400 dark:hover:text-brand-400">
                Chi tiết
                <x-icon name="arrow-right" class="h-3.5 w-3.5" />
            </a>
        </div>
    @endif
</article>
