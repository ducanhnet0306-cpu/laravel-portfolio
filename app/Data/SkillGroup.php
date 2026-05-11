<?php

declare(strict_types=1);

namespace App\Data;

use Illuminate\Support\Collection;

final class SkillGroup
{
    /**
     * @param  Collection<int,Skill>  $items
     */
    public function __construct(
        public readonly string $name,
        public readonly Collection $items,
    ) {
    }
}
