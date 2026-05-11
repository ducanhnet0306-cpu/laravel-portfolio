<?php

declare(strict_types=1);

namespace App\Data;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

final class Project
{
    /**
     * @param  Collection<int,string>  $tags
     */
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly Collection $tags,
        public readonly ?string $image = null,
        public readonly ?string $liveUrl = null,
        public readonly ?string $repoUrl = null,
        public readonly bool $featured = false,
    ) {
    }

    public function slug(): string
    {
        return Str::slug($this->title);
    }

    public function hasLinks(): bool
    {
        return $this->liveUrl !== null || $this->repoUrl !== null;
    }
}
