<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class PortfolioTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_renders_with_portfolio_content(): void
    {
        $response = $this->get(route('portfolio.index'));

        $response->assertOk();
        $response->assertSee(config('portfolio.owner.name'));
        $response->assertSee(config('portfolio.hero.subheadline'));
    }

    public function test_project_detail_returns_404_for_unknown_slug(): void
    {
        $this->get(route('portfolio.project.show', 'no-such-project'))
             ->assertNotFound();
    }

    public function test_contact_form_validates_required_fields(): void
    {
        $this->from(route('portfolio.index'))
             ->post(route('contact.store'), [])
             ->assertSessionHasErrors(['name', 'email', 'message']);
    }

    public function test_contact_form_logs_payload_when_mailer_is_log(): void
    {
        config()->set('mail.default', 'log');

        Log::shouldReceive('info')
            ->once()
            ->with('Contact form submission', \Mockery::on(fn ($p) => $p['email'] === 'jane@example.com'));

        $this->post(route('contact.store'), [
            'name'    => 'Jane Doe',
            'email'   => 'jane@example.com',
            'subject' => 'Hi',
            'message' => 'This is a long enough message body.',
        ])->assertRedirect();
    }
}
