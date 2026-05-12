@extends('layouts.app', ['title' => 'Không tìm thấy trang — 404'])

@section('content')
    <section class="section">
        <div class="container-page max-w-xl text-center">
            <p class="font-display text-7xl font-extrabold text-brand-600">404</p>
            <h1 class="mt-4 text-3xl font-bold text-slate-900 dark:text-slate-50">Không tìm thấy trang</h1>
            <p class="mt-3 text-slate-600 dark:text-slate-400">
                Đường dẫn bạn đang truy cập không tồn tại hoặc đã được di chuyển.
            </p>
            <a href="{{ route('portfolio.index') }}" class="btn-primary mt-8">
                Về trang chủ
                <x-icon name="arrow-right" class="h-4 w-4" />
            </a>
        </div>
    </section>
@endsection
