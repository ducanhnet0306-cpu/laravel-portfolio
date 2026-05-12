@props(['portfolio'])

<section id="projects" class="section bg-white dark:bg-slate-950">
    <div class="container-page">

        <div class="flex flex-col items-start justify-between gap-6 sm:flex-row sm:items-end reveal">
            <div class="max-w-2xl">
                <span class="section-eyebrow">Dự án nổi bật</span>
                <h2 class="section-title">Một số việc tôi đã thực hiện gần đây</h2>
                <p class="section-lead">
                    Những dự án dưới đây thể hiện cách tôi tiếp cận vấn đề từ kiến trúc, code,
                    đến vận hành — luôn ưu tiên tốc độ giao và trải nghiệm cuối.
                </p>
            </div>
        </div>

        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($portfolio->projects as $project)
                <x-project-card :project="$project" class="reveal" />
            @endforeach
        </div>
    </div>
</section>
