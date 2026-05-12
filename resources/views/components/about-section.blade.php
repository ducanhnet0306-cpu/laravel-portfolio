@props(['portfolio'])

@php $about = $portfolio->about; @endphp

<section id="about" class="section bg-white dark:bg-slate-950">
    <div class="container-page grid gap-12 lg:grid-cols-12">

        <div class="lg:col-span-5 reveal">
            <span class="section-eyebrow">{{ $about['title'] ?? 'Về tôi' }}</span>
            <h2 class="section-title text-balance">
                {{ $about['lead'] ?? '' }}
            </h2>
        </div>

        <div class="lg:col-span-7 reveal">
            <div class="space-y-5 text-base leading-relaxed text-slate-600 sm:text-lg dark:text-slate-400">
                @foreach (($about['paragraphs'] ?? []) as $p)
                    <p>{{ $p }}</p>
                @endforeach
            </div>

            <ul class="mt-8 grid gap-3 sm:grid-cols-2">
                @foreach ((collect($portfolio->skills)->flatMap->items->take(6)) as $skill)
                    <li class="flex items-center gap-3 rounded-xl border border-slate-100 bg-slate-50/60 px-4 py-3 dark:border-slate-800 dark:bg-slate-900/80">
                        <span class="grid h-7 w-7 place-items-center rounded-full bg-brand-600/10 text-brand-700 dark:bg-brand-500/15 dark:text-brand-400">
                            <x-icon name="check" class="h-4 w-4" />
                        </span>
                        <span class="text-sm font-medium text-slate-700 dark:text-slate-300">{{ $skill->name }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
