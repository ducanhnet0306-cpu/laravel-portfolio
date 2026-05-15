<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactMessageMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Store a contact-form submission.
     *
     * Behaviour:
     *  - Validation is delegated to {@see StoreContactRequest}.
     *  - When MAIL_MAILER=log (the default for local dev) the message is just
     *    written to storage/logs/laravel.log via the Log facade so that the
     *    site works out-of-the-box without SMTP credentials.
     *  - Otherwise the message is sent to CONTACT_INBOX_ADDRESS via Mail.
     *  - Either way we redirect back with a flash-message used by the Blade
     *    layout to render a success banner.
     */
    public function store(StoreContactRequest $request): RedirectResponse
    {
        $payload = $request->validated();

        $inbox = (string) config('portfolio.contact.inbox', env('CONTACT_INBOX_ADDRESS', ''));
        $mailer = (string) config('mail.default');

        if ($mailer === 'log' || $inbox === '') {
            Log::info('Contact form submission', $payload);
        } else {
            Mail::to($inbox)->send(new ContactMessageMail($payload));
        }

        return redirect()
            ->route('portfolio.index')
            ->with('contact_status', __('Cảm ơn bạn! Tin nhắn đã được gửi thành công.'))
            ->withFragment('contact');
    }
}
