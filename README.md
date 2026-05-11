# Portfolio Website (Laravel 11)

> Trang web portfolio cá nhân được xây dựng bằng **Laravel 11**, **Tailwind CSS** và **Vite**.
> Personal portfolio site built with Laravel 11, Tailwind CSS and Vite.

Giao diện hiện đại, tông màu xanh dương + trắng, **mobile-first responsive**, có form liên hệ
chạy được ngay (validate phía server, gửi mail hoặc ghi log tuỳ cấu hình `.env`).

A modern, blue-and-white, mobile-first portfolio with a working server-validated
contact form that either sends mail or logs the submission depending on `.env`.

---

## 1. Tổng quan / Overview

| | |
|---|---|
| **Framework** | Laravel 11 (PHP ^8.2) |
| **Frontend**  | Blade + Tailwind CSS 3 + Vite 5 |
| **JS**        | Vanilla JS (Intersection Observer) — không cần SPA framework |
| **Database**  | SQLite (mặc định, tạo tự động) — đổi sang MySQL/Postgres trong `.env` nếu cần |
| **Mail**      | Mặc định `MAIL_MAILER=log` → form liên hệ ghi vào `storage/logs/laravel.log` |
| **Tests**     | PHPUnit 11 (`tests/Feature`, `tests/Unit`) |

---

## 2. Tech stack chi tiết / Detailed stack

- **PHP 8.2+** với `declare(strict_types=1);` áp dụng nhất quán
- **Laravel 11.9** — kiến trúc tinh gọn (`bootstrap/app.php`, `bootstrap/providers.php`)
- **Tailwind CSS 3.4** + plugins `@tailwindcss/forms`, `@tailwindcss/typography`
- **Vite 5** + `laravel-vite-plugin` cho HMR và bundle production
- **Be Vietnam Pro / Inter / Plus Jakarta Sans** (Google Fonts) cho typography song ngữ
- **PHPUnit 11**, **Pint** (code style — tuân thủ PSR-12)

---

## 3. Cấu trúc thư mục / Folder structure

```
c:\Laravel
├── app/
│   ├── Data/                          ← View models (read-only, không phụ thuộc Eloquent)
│   │   ├── PortfolioData.php          ← Cổng truy cập duy nhất tới nội dung portfolio
│   │   ├── Project.php / Skill.php / SkillGroup.php
│   │   ├── ExperienceItem.php / SocialLink.php
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Controller.php
│   │   │   └── Web/                   ← Tất cả controller phục vụ HTML đặt trong namespace Web
│   │   │       ├── PortfolioController.php
│   │   │       └── ContactController.php
│   │   └── Requests/
│   │       └── StoreContactRequest.php   ← Form Request — chứa toàn bộ rules + messages
│   ├── Mail/
│   │   └── ContactMessageMail.php
│   ├── Models/User.php                ← Giữ lại để tương thích auth scaffolding của Laravel
│   └── Providers/AppServiceProvider.php  ← Bind PortfolioData & share cho mọi view
│
├── bootstrap/                         ← Laravel 11 streamlined bootstrap
│   ├── app.php
│   └── providers.php
│
├── config/
│   ├── app.php / auth.php / cache.php / database.php / filesystems.php
│   ├── logging.php / mail.php / queue.php / services.php / session.php
│   └── portfolio.php                  ← ⭐ NỘI DUNG WEBSITE NẰM Ở ĐÂY (sửa file này thôi!)
│
├── database/
│   ├── factories/UserFactory.php
│   ├── migrations/                    ← Bảng users / cache / jobs (chuẩn Laravel 11)
│   └── seeders/DatabaseSeeder.php
│
├── public/
│   ├── index.php                      ← Entry point
│   ├── .htaccess / robots.txt
│   └── build/                         ← Sinh ra sau khi `npm run build`
│
├── resources/
│   ├── css/app.css                    ← Tailwind layers + design tokens
│   ├── js/app.js + bootstrap.js       ← Reveal-on-scroll, mobile nav
│   └── views/
│       ├── layouts/app.blade.php      ← Shell HTML (head, header, footer, slot)
│       ├── components/                ← Anonymous Blade components — mỗi section một file
│       │   ├── site-header.blade.php
│       │   ├── site-footer.blade.php
│       │   ├── icon.blade.php          ← Inline SVG icon library
│       │   ├── hero-section.blade.php
│       │   ├── about-section.blade.php
│       │   ├── skills-section.blade.php
│       │   ├── projects-section.blade.php
│       │   ├── project-card.blade.php
│       │   ├── experience-section.blade.php
│       │   └── contact-section.blade.php
│       ├── portfolio/index.blade.php   ← Trang chủ (single-page)
│       ├── portfolio/project.blade.php ← Trang chi tiết dự án theo slug
│       ├── emails/contact.blade.php    ← Markdown mail
│       └── errors/404.blade.php
│
├── routes/
│   ├── web.php                        ← Routes nhóm theo controller
│   └── console.php
│
├── storage/                           ← Logs, cache, sessions, views
├── tests/
│   ├── Feature/PortfolioTest.php
│   ├── Unit/PortfolioDataTest.php
│   └── TestCase.php
│
├── .env.example
├── artisan
├── composer.json
├── package.json
├── postcss.config.js
├── tailwind.config.js
├── vite.config.js
└── README.md  ← (file này)
```

### Vì sao chia như vậy / Why this layout

| Lựa chọn | Lý do |
|---|---|
| `app/Http/Controllers/Web/*`         | Tách rõ controller phục vụ HTML khỏi (sau này) `Api/*` hoặc `Admin/*`. |
| `app/Data/*` (view models)           | Tránh logic & `config()` trong Blade; dữ liệu đi qua object có type rõ ràng. |
| `config/portfolio.php`               | Người không phải dev cũng có thể sửa nội dung mà không đụng template. |
| `app/Http/Requests/StoreContactRequest.php` | Form Request gom validation + messages, controller chỉ còn 1 nhiệm vụ. |
| `resources/views/components/*`       | Anonymous Blade components — ráp page như Lego, dễ tái sử dụng & test. |
| `AppServiceProvider::boot()` share view | `$portfolio` có sẵn ở mọi Blade — header/footer không cần inject thủ công. |

---

## 4. Coding conventions / Quy ước

- **PSR-12** cho PHP (chạy `vendor/bin/pint` để format).
- `declare(strict_types=1);` ở mọi file PHP do dự án viết ra.
- Controllers **thin**: validate qua Form Request, lấy dữ liệu qua view model, trả `view()` / `redirect()`.
- Blade chỉ chứa **trình bày** — không gọi `config()`, không truy vấn DB, không tính toán phức tạp.
- CSS tổ chức theo **3 lớp Tailwind** (`@layer base / components / utilities`).
- Routes đặt **tên** (`portfolio.index`, `portfolio.project.show`, `contact.store`) — không hardcode URL trong Blade.
- Components Blade dùng **kebab-case** (`<x-hero-section />`).
- Nội dung tiếng Việt nằm trong `config/portfolio.php`; chuỗi UI nằm trực tiếp trong Blade (chưa cần `lang/`).

---

## 5. Cài đặt / Installation

> Yêu cầu: PHP 8.2+, Composer 2, Node 18+ (đề xuất 20+).

```bash
cd c:\Laravel

# 1. Cài dependencies PHP
composer install

# 2. Tạo file .env
cp .env.example .env

# 3. Sinh APP_KEY
php artisan key:generate

# 4. Tạo database SQLite (file rỗng) và chạy migrations
#    Có thể bỏ qua nếu đổi DB_CONNECTION sang MySQL/Postgres trong .env.
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate

# 5. Cài & build assets
npm install
npm run build      # production build
# hoặc dev mode (HMR):
# npm run dev

# 6. Khởi chạy server
php artisan serve
# → mở http://127.0.0.1:8000
```

### Sanity check

```bash
php artisan route:list           # xem các route đã đăng ký
php artisan config:clear         # nếu vừa sửa config/portfolio.php
php artisan test                 # chạy bộ test (Feature + Unit)
```

---

## 6. Cách tuỳ biến nội dung / Customising content

99% các thay đổi đều nằm ở **một file duy nhất**: [`config/portfolio.php`](config/portfolio.php).

```php
return [
    'owner'    => [...],   // Tên, chức danh, email, điện thoại, ảnh đại diện
    'hero'     => [...],   // Tiêu đề lớn + 2 nút CTA
    'about'    => [...],   // Đoạn giới thiệu + thống kê
    'skills'   => [...],   // Nhóm kỹ năng + level (0–100)
    'projects' => [...],   // Dự án — mỗi dự án có tags, link live/repo, featured
    'experience' => [...], // Timeline kinh nghiệm + thành tựu
    'socials'  => [...],   // GitHub / LinkedIn / X / Email...
    'contact'  => [...],   // Tiêu đề & email nhận tin nhắn
];
```

Sau khi sửa nhớ chạy `php artisan config:clear` (nếu đã `config:cache`).

### Đổi avatar / CV

- Đặt ảnh vào `public/storage/avatar.jpg` rồi gán `'avatar' => '/storage/avatar.jpg'`.
- Đặt CV PDF vào `public/storage/cv.pdf` rồi gán `'resume_url' => '/storage/cv.pdf'`.

### Thay màu thương hiệu

Sửa palette `brand.*` trong [`tailwind.config.js`](tailwind.config.js) → chạy lại `npm run build`.

---

## 7. Form liên hệ / Contact form

| `MAIL_MAILER` | Hành vi |
|---|---|
| `log` *(mặc định)* | Tin nhắn được ghi vào `storage/logs/laravel.log`. Không cần SMTP. |
| `smtp` / `resend` / `postmark` / ... | Gửi email tới địa chỉ trong `CONTACT_INBOX_ADDRESS` (cũng có thể đặt trực tiếp ở `config/portfolio.php` → `contact.inbox`). |

Form có:

- ✅ Validate phía server (`StoreContactRequest`) với thông báo lỗi tiếng Việt.
- ✅ Bảo vệ honeypot (`name="website"`) — bot fill là bị reject.
- ✅ Throttle `6 request / phút / IP` (trong `routes/web.php`).
- ✅ CSRF token (`@csrf`).
- ✅ Flash success message hiển thị banner xanh sau khi gửi.

---

## 8. Routes

| Method | URI                  | Tên                      | Action                                       |
|--------|----------------------|--------------------------|----------------------------------------------|
| GET    | `/`                  | `portfolio.index`        | `Web\PortfolioController@index`              |
| GET    | `/projects/{slug}`   | `portfolio.project.show` | `Web\PortfolioController@showProject`        |
| POST   | `/contact`           | `contact.store`          | `Web\ContactController@store`                |
| GET    | `/up`                | health-check             | (Laravel built-in)                           |

---

## 9. Lệnh hữu ích / Useful commands

```bash
composer dev          # Chạy server + queue + logs + vite cùng lúc (concurrently)
vendor/bin/pint       # Format code theo PSR-12
php artisan test      # PHPUnit
npm run build         # Bundle assets cho production
```

---

## 10. License

MIT — bạn tự do sao chép, sửa và sử dụng cho mục đích cá nhân hoặc thương mại.
