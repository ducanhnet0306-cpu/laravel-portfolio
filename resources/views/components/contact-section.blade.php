@props(['portfolio'])

@php $contact = $portfolio->contact; @endphp

<section id="contact" class="section bg-white">
    <div class="container-page grid gap-12 lg:grid-cols-12">

        <div class="lg:col-span-5 reveal">
            <span class="section-eyebrow">{{ $contact['title'] ?? 'Liên hệ' }}</span>
            <h2 class="section-title text-balance">Cùng nhau tạo ra điều gì đó tuyệt vời.</h2>
            <p class="section-lead">{{ $contact['lead'] ?? '' }}</p>

            <ul class="mt-8 space-y-4 text-sm text-slate-700">
                @if(! empty($portfolio->owner['email']))
                    <li class="flex items-center gap-3">
                        <span class="grid h-10 w-10 place-items-center rounded-full bg-brand-50 text-brand-700">
                            <x-icon name="mail" class="h-5 w-5" />
                        </span>
                        <a href="mailto:{{ $portfolio->owner['email'] }}" class="font-medium hover:text-brand-700">
                            {{ $portfolio->owner['email'] }}
                        </a>
                    </li>
                @endif

                @if(! empty($portfolio->owner['phone']))
                    <li class="flex items-center gap-3">
                        <span class="grid h-10 w-10 place-items-center rounded-full bg-brand-50 text-brand-700">
                            <x-icon name="phone" class="h-5 w-5" />
                        </span>
                        <a href="tel:{{ preg_replace('/\s+/', '', $portfolio->owner['phone']) }}" class="font-medium hover:text-brand-700">
                            {{ $portfolio->owner['phone'] }}
                        </a>
                    </li>
                @endif

                @if(! empty($contact['address']))
                    <li class="flex items-center gap-3">
                        <span class="grid h-10 w-10 place-items-center rounded-full bg-brand-50 text-brand-700">
                            <x-icon name="map" class="h-5 w-5" />
                        </span>
                        <span class="font-medium">{{ $contact['address'] }}</span>
                    </li>
                @endif
            </ul>

            <div class="mt-8 flex flex-wrap gap-2">
                @foreach ($portfolio->socials as $social)
                    <a href="{{ $social->url }}" target="_blank" rel="noopener"
                       class="grid h-10 w-10 place-items-center rounded-full border border-slate-200 text-slate-600 transition hover:border-brand-400 hover:text-brand-700"
                       aria-label="{{ $social->label }}">
                        <x-icon :name="$social->icon" class="h-5 w-5" />
                    </a>
                @endforeach
            </div>
        </div>

        <div class="lg:col-span-7 reveal">
            <div class="rounded-3xl bg-gradient-to-br from-brand-600 to-brand-800 p-1 shadow-soft">
                <div class="rounded-[1.4rem] bg-white p-6 sm:p-8">
                    @if (session('contact_status'))
                        <div role="status"
                             class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
                            <span class="mt-0.5 grid h-5 w-5 place-items-center rounded-full bg-emerald-600 text-white">
                                <x-icon name="check" class="h-3.5 w-3.5" />
                            </span>
                            <p>{{ session('contact_status') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5" novalidate>
                        @csrf

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="contact-name" class="field-label">Họ và tên <span class="text-rose-500">*</span></label>
                                <input id="contact-name" name="name" type="text" required maxlength="120"
                                       value="{{ old('name') }}"
                                       autocomplete="name"
                                       class="field mt-1 @error('name') border-rose-400 @enderror">
                                @error('name')<p class="field-error">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label for="contact-email" class="field-label">Email <span class="text-rose-500">*</span></label>
                                <input id="contact-email" name="email" type="email" required maxlength="180"
                                       value="{{ old('email') }}"
                                       autocomplete="email"
                                       class="field mt-1 @error('email') border-rose-400 @enderror">
                                @error('email')<p class="field-error">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div>
                            <label for="contact-subject" class="field-label">Tiêu đề</label>
                            <input id="contact-subject" name="subject" type="text" maxlength="180"
                                   value="{{ old('subject') }}"
                                   class="field mt-1 @error('subject') border-rose-400 @enderror"
                                   placeholder="Ví dụ: Cần tư vấn xây dựng MVP">
                            @error('subject')<p class="field-error">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="contact-message" class="field-label">Nội dung <span class="text-rose-500">*</span></label>
                            <textarea id="contact-message" name="message" rows="5" required minlength="10" maxlength="5000"
                                      class="field mt-1 @error('message') border-rose-400 @enderror"
                                      placeholder="Hãy kể cho tôi nghe về dự án của bạn...">{{ old('message') }}</textarea>
                            @error('message')<p class="field-error">{{ $message }}</p>@enderror
                        </div>

                        <input type="text" name="website" tabindex="-1" autocomplete="off"
                               class="hidden" aria-hidden="true">

                        <div class="flex flex-col-reverse items-stretch justify-between gap-3 sm:flex-row sm:items-center">
                            <p class="text-xs text-slate-500">
                                Bằng cách gửi, bạn đồng ý cho phép tôi liên hệ lại qua email.
                            </p>
                            <button type="submit" class="btn-primary">
                                Gửi tin nhắn
                                <x-icon name="arrow-right" class="h-4 w-4" />
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
