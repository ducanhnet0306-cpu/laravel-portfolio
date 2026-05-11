<?php

declare(strict_types=1);

use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\PortfolioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Mọi route hiển thị trên trình duyệt sống ở đây. Nhóm theo controller giúp
| `php artisan route:list` đọc dễ hơn và tách rõ trách nhiệm:
|
|   PortfolioController — render các trang public (single page + project detail).
|   ContactController   — xử lý POST từ form liên hệ.
|
*/

Route::controller(PortfolioController::class)->group(function () {
    Route::get('/',                'index')->name('portfolio.index');
    Route::get('/projects/{slug}', 'showProject')->name('portfolio.project.show');
});

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('contact.store');
