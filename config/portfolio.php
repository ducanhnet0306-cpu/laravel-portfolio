<?php

/*
|--------------------------------------------------------------------------
| Portfolio content
|--------------------------------------------------------------------------
|
| Toàn bộ nội dung hiển thị trên website portfolio được tập trung tại file
| này. Hãy chỉnh sửa các giá trị ở đây để cá nhân hoá website mà không cần
| đụng vào Blade hay PHP. Sau khi sửa xong nhớ chạy:
|
|     php artisan config:clear
|
| nếu trước đó bạn đã `config:cache`.
|
*/

return [

    'owner' => [
        'name'       => 'Trần Đức Anh',
        'tagline'    => 'Fullstack Developer · .NET · React Native · Next.js',
        'role'       => 'Fullstack Developer',
        'location'   => 'Phường 13, Quận Tân Bình, TP. Hồ Chí Minh',
        'email'      => 'ducanh.net0306@gmail.com',
        'phone'      => '0375 948 784',
        'avatar'     => null,
        'resume_url' => '/cv-tran-duc-anh.pdf',
    ],

    'hero' => [
        'eyebrow'       => 'Xin chào, tôi là',
        'headline'      => 'Trần Đức Anh',
        'subheadline'   => 'Tôi phát triển sản phẩm web & mobile quy mô lớn với .NET Core, React Native/Expo và Next.js — tối ưu hiệu năng, SEO và trải nghiệm người dùng; chủ động ứng dụng AI coding tools để tăng tốc delivery.',
        'primary_cta'   => ['label' => 'Xem dự án', 'href' => '#projects'],
        'secondary_cta' => ['label' => 'Liên hệ với tôi', 'href' => '#contact'],
    ],

    'about' => [
        'title' => 'Về tôi',
        'lead'  => 'Sinh 03/06/2003. Tốt nghiệp Cao đẳng kỹ thuật Lý Tự Trọng (Công nghệ Thông tin, hạng Giỏi, GPA 3.5/4.0). Chứng chỉ TOEIC 600 (11/2023).',
        'paragraphs' => [
            'Ngắn hạn: ứng dụng kinh nghiệm fullstack thực chiến vào sản phẩm có scale lớn, đóng góp vào tính năng core và hiệu năng hệ thống, đồng thời khai thác AI coding tools để tăng tốc delivery và nâng chất lượng code.',
            'Dài hạn: hướng tới Senior Developer trong 1–2 năm với năng lực độc lập thiết kế kiến trúc và dẫn dắt feature end-to-end; Tech Lead trong 3–5 năm — ra quyết định kỹ thuật, mentor junior và phối hợp chặt với Product.',
        ],
        'highlights' => [
            ['label' => 'Kinh nghiệm', 'value' => '2+ năm'],
            ['label' => 'TOEIC', 'value' => '600'],
            ['label' => 'GPA CĐ', 'value' => '3.5/4'],
            ['label' => 'Stack chính', 'value' => '.NET · RN'],
        ],
    ],

    'skills' => [
        [
            'name'  => 'Frontend & Mobile',
            'items' => [
                ['name' => 'React Native & Expo (iOS/Android, production)', 'level' => 92],
                ['name' => 'Next.js (SSR/SSG, SEO)', 'level' => 88],
                ['name' => 'Angular, TypeScript, JavaScript', 'level' => 85],
                ['name' => 'HTML5, CSS3, Tailwind CSS', 'level' => 88],
            ],
        ],
        [
            'name'  => 'Backend & API',
            'items' => [
                ['name' => '.NET Framework / .NET 8 — ASP.NET, MVC, Web API, EF', 'level' => 92],
                ['name' => 'REST API, JWT, authorization', 'level' => 88],
                ['name' => 'PHP & Laravel', 'level' => 78],
                ['name' => 'Blazor', 'level' => 80],
            ],
        ],
        [
            'name'  => 'CSDL · Công cụ · AI',
            'items' => [
                ['name' => 'SQL Server (SP, tuning, báo cáo)', 'level' => 88],
                ['name' => 'PostgreSQL (schema, JSONB, indexing)', 'level' => 82],
                ['name' => 'Git / GitHub / GitLab, Postman, Swagger', 'level' => 86],
                ['name' => 'Claude Code, Cursor Pro, workflow AI', 'level' => 84],
            ],
        ],
    ],

    'projects' => [
        [
            'title'       => 'Mobile App Việc Làm — Vieclam.net',
            'description' => 'Main Mobile Developer từ khởi tạo: kiến trúc, base source, navigation, state, CI/CD. Đầy đủ luồng đăng ký/đăng nhập, hồ sơ ứng viên, tìm kiếm & ứng tuyển, chat nhà tuyển dụng, push notification; tối ưu bundle và UX trên iOS & Android.',
            'tags'        => ['React Native', 'Expo', 'TypeScript', 'REST API'],
            'live_url'    => 'https://vieclam.net',
            'repo_url'    => null,
            'featured'    => true,
        ],
        [
            'title'       => 'Tối ưu Muaban.net & Vieclam.net',
            'description' => 'Tối ưu trang traffic cao: cải thiện tốc độ tải trang khoảng 30–40%, giảm response time API trung bình ~35% nhờ lazy-loading, caching, tối ưu query và SEO.',
            'tags'        => ['Next.js', 'TypeScript', '.NET Core', 'PostgreSQL'],
            'live_url'    => 'https://muaban.net',
            'repo_url'    => null,
            'featured'    => true,
        ],
        [
            'title'       => 'Bổ sung tính năng Mogi.vn',
            'description' => 'Phát triển tính năng theo nghiệp vụ bất động sản, tích hợp API, đảm bảo ổn định và khả năng mở rộng; đồng bộ dữ liệu giữa các module.',
            'tags'        => ['Angular', '.NET Framework', 'SQL Server'],
            'live_url'    => 'https://mogi.vn',
            'repo_url'    => null,
            'featured'    => true,
        ],
        [
            'title'       => 'Hệ thống Diễn đàn Dân tộc (Thái Bình, Gia Lai)',
            'description' => 'Quản lý thông tin dân tộc, diễn đàn trực tuyến; thuật toán tổng hợp số liệu & báo cáo; phiên bản mobile React Native cho cán bộ.',
            'tags'        => ['ASP.NET', 'Blazor', 'SQL Server', 'React Native'],
            'live_url'    => 'https://diendandantocgialai.vntech.asia',
            'repo_url'    => null,
            'featured'    => false,
        ],
        [
            'title'       => 'Hệ thống Quản lý Di sản Văn hóa',
            'description' => 'Nền tảng cấp tỉnh: người dân tra cứu, cơ quan cập nhật thông tin di sản văn hóa.',
            'tags'        => ['ASP.NET Framework', 'Blazor', 'SQL Server'],
            'live_url'    => 'https://quanlydisan.vntech.asia',
            'repo_url'    => null,
            'featured'    => false,
        ],
        [
            'title'       => 'Phần mềm Dịch vụ Việc làm (tuyến tỉnh)',
            'description' => 'Ghép đôi việc làm: ứng tuyển, doanh nghiệp tìm hồ sơ; thuật toán matching, tối ưu quản lý ứng viên & tin tuyển dụng.',
            'tags'        => ['ASP.NET Framework', 'Blazor', 'SQL Server'],
            'live_url'    => 'https://vlls.vntech.asia',
            'repo_url'    => null,
            'featured'    => false,
        ],
    ],

    'experience' => [
        [
            'role'           => 'Fullstack Developer',
            'organization'   => 'Công ty Cổ phần Định Anh',
            'period'         => '09/2025 — Hiện tại',
            'location'       => 'TP. Hồ Chí Minh',
            'summary'        => 'Fullstack trên các nền tảng traffic lớn (Muaban.net, Vieclam.net), Mogi.vn và app mobile Việc Làm.',
            'achievements'   => [
                'Tối ưu hiệu năng trang cao: tải trang +30–40%, API response ~-35% (lazy-load, cache, query, SEO).',
                'Chủ trì app Việc Làm từ 02/2026: kiến trúc, base code, 6 luồng chính (auth, profile, search, apply, chat, push) iOS & Android.',
                'Tích hợp API với backend, xử lý bug ưu tiên cao; AI Agent (Claude Code, Cursor Pro, Antigravity) trong workflow.',
            ],
        ],
        [
            'role'           => 'Backend Developer → Fullstack Developer',
            'organization'   => 'Tập đoàn Công nghệ Thành Nam',
            'period'         => '09/2023 — 02/2025',
            'location'       => 'Việt Nam (triển khai đa tỉnh)',
            'summary'        => 'Hệ thống web phục vụ cơ quan nhà nước cấp tỉnh: ASP.NET Framework, SQL Server, Blazor.',
            'achievements'   => [
                'Trọn vòng đời dự án: phân tích yêu cầu, thiết kế CSDL, API backend, giao diện quản trị.',
                'Thuật toán nghiệp vụ (matching việc làm, báo cáo) và tối ưu SQL.',
                'Triển khai thực tế tại 3–5 tỉnh (Thái Bình, Gia Lai…), phục vụ hàng nghìn cán bộ & doanh nghiệp.',
            ],
        ],
    ],

    'socials' => [
        ['label' => 'Email', 'url' => 'mailto:ducanh.net0306@gmail.com', 'icon' => 'mail'],
        ['label' => 'Điện thoại', 'url' => 'tel:+84375948784', 'icon' => 'phone'],
    ],

    'contact' => [
        'title'   => 'Liên hệ',
        'lead'    => 'Bạn có dự án web/mobile, tối ưu hiệu năng hoặc cần trao đổi về vị trí Fullstack? Gửi tin — tôi sẽ phản hồi sớm nhất có thể.',
        'inbox'   => env('CONTACT_INBOX_ADDRESS', 'ducanh.net0306@gmail.com'),
        'address' => 'Phường 13, Quận Tân Bình, TP. Hồ Chí Minh',
    ],

];
