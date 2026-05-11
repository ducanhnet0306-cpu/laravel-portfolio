@php
    /** @var array $data */
@endphp
<x-mail::message>
# Tin nhắn mới từ portfolio

**Họ và tên:** {{ $data['name'] ?? '—' }}
**Email:** {{ $data['email'] ?? '—' }}
**Tiêu đề:** {{ $data['subject'] ?? '(không có)' }}

---

{!! nl2br(e($data['message'] ?? '')) !!}

<x-mail::button :url="'mailto:'.($data['email'] ?? '')">
Trả lời {{ $data['name'] ?? '' }}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
