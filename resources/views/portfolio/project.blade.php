@extends('layouts.app', ['title' => $project->title.' — Dự án'])

@section('content')
    <section class="section bg-white dark:bg-slate-950">
        <div class="container-page max-w-3xl">
            <a href="{{ route('portfolio.index') }}#projects"
               class="inline-flex items-center gap-1 text-sm font-semibold text-brand-700 hover:text-brand-900 dark:text-brand-400 dark:hover:text-brand-300">
                ← Quay lại danh sách dự án
            </a>

            <h1 class="mt-6 text-4xl font-extrabold text-slate-900 sm:text-5xl dark:text-slate-50">
                {{ $project->title }}
            </h1>

            <p class="mt-4 text-lg text-slate-600 dark:text-slate-400">{{ $project->description }}</p>

            <ul class="mt-6 flex flex-wrap gap-1.5">
                @foreach ($project->tags as $tag)
                    <li><span class="tag">{{ $tag }}</span></li>
                @endforeach
            </ul>

            @if($project->hasLinks())
                <div class="mt-8 flex flex-wrap gap-3">
                    @if($project->liveUrl)
                        <a href="{{ $project->liveUrl }}" target="_blank" rel="noopener" class="btn-primary">
                            Xem live
                            <x-icon name="external" class="h-4 w-4" />
                        </a>
                    @endif
                    @if($project->repoUrl)
                        <a href="{{ $project->repoUrl }}" target="_blank" rel="noopener" class="btn-secondary">
                            Mã nguồn
                            <x-icon name="github" class="h-4 w-4" />
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </section>
@endsection
