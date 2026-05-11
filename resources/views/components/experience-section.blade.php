@props(['portfolio'])

<section id="experience" class="section bg-slate-50/60">
    <div class="container-page">

        <div class="max-w-2xl reveal">
            <span class="section-eyebrow">Kinh nghiệm</span>
            <h2 class="section-title">Hành trình nghề nghiệp</h2>
            <p class="section-lead">
                Một dòng thời gian rút gọn về những công ty và vai trò mà tôi đã đảm nhận trong những năm qua.
            </p>
        </div>

        <ol class="relative mt-12 border-l border-brand-100 pl-6 sm:pl-10">
            @foreach ($portfolio->experience as $item)
                <li class="relative mb-10 last:mb-0 reveal">
                    <span class="absolute -left-[34px] sm:-left-[44px] top-1.5 grid h-7 w-7 place-items-center rounded-full bg-brand-600 text-xs font-bold text-white shadow-soft">
                        {{ $loop->iteration }}
                    </span>

                    <div class="rounded-2xl bg-white p-6 ring-1 ring-slate-100 sm:p-7">
                        <div class="flex flex-wrap items-baseline justify-between gap-2">
                            <h3 class="font-display text-lg font-bold text-slate-900">
                                {{ $item->role }}
                                <span class="text-brand-700">@ {{ $item->organization }}</span>
                            </h3>
                            <span class="rounded-full bg-brand-50 px-3 py-1 text-xs font-semibold text-brand-700">
                                {{ $item->period }}
                            </span>
                        </div>

                        @if($item->location)
                            <p class="mt-1 text-xs text-slate-500">{{ $item->location }}</p>
                        @endif

                        @if($item->summary)
                            <p class="mt-3 text-sm text-slate-600">{{ $item->summary }}</p>
                        @endif

                        @if($item->achievements->isNotEmpty())
                            <ul class="mt-4 space-y-2 text-sm text-slate-700">
                                @foreach ($item->achievements as $a)
                                    <li class="flex gap-2">
                                        <span class="mt-0.5 grid h-5 w-5 shrink-0 place-items-center rounded-full bg-brand-100 text-brand-700">
                                            <x-icon name="check" class="h-3.5 w-3.5" />
                                        </span>
                                        <span>{{ $a }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
</section>
