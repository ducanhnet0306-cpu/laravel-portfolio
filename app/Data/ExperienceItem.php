<?php

declare(strict_types=1);

namespace App\Data;

use Illuminate\Support\Collection;

final class ExperienceItem
{
    /**
     * @param  Collection<int,string>  $achievements
     */
    public function __construct(
        public readonly string $role,
        public readonly string $organization,
        public readonly string $period,
        public readonly ?string $location,
        public readonly string $summary,
        public readonly Collection $achievements,
    ) {
    }
}
