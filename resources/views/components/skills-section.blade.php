@props(['portfolio'])

<section id="skills" class="section bg-slate-50/60">
    <div class="container-page">

        <div class="max-w-2xl reveal">
            <span class="section-eyebrow">Kỹ năng & công nghệ</span>
            <h2 class="section-title">Bộ công cụ tôi đang sử dụng</h2>
            <p class="section-lead">
                Một danh sách (không đầy đủ) những công nghệ tôi sử dụng hằng ngày để thiết kế,
                xây dựng và vận hành các sản phẩm web.
            </p>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($portfolio->skills as $group)
                <article class="card reveal">
                    <header class="mb-4 flex items-center justify-between">
                        <h3 class="font-display text-lg font-bold text-slate-900">{{ $group->name }}</h3>
                        <span class="tag">{{ $group->items->count() }} mục</span>
                    </header>
                    <ul class="space-y-4">
                        @foreach ($group->items as $skill)
                            <li>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="font-medium text-slate-700">{{ $skill->name }}</span>
                                    @if($skill->level !== null)
                                        <span class="text-xs text-slate-500">{{ $skill->level }}%</span>
                                    @endif
                                </div>
                                @if($skill->level !== null)
                                    <div class="mt-2 h-2 w-full overflow-hidden rounded-full bg-slate-100">
                                        <div class="h-full rounded-full bg-gradient-to-r from-brand-500 to-brand-700"
                                             style="width: {{ $skill->level }}%"></div>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </div>
</section>
