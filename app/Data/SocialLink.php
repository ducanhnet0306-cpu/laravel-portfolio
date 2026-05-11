<?php

declare(strict_types=1);

namespace App\Data;

final class SocialLink
{
    public function __construct(
        public readonly string $label,
        public readonly string $url,
        public readonly ?string $icon = null,
    ) {
    }
}
