<?php

declare(strict_types=1);

namespace App\Data;

use Illuminate\Support\Collection;

/**
 * Read-only view model that exposes the portfolio's content to Blade views.
 *
 * The data itself lives in {@see config/portfolio.php} so non-developers can
 * tweak copy without touching PHP classes. Controllers and Blade templates
 * should always read through this object instead of calling config() directly,
 * which keeps presentation logic out of templates.
 */
final class PortfolioData
{
    /**
     * @param  array<string,mixed>  $owner
     * @param  array<string,mixed>  $hero
     * @param  array<string,mixed>  $about
     * @param  Collection<int,SkillGroup>  $skills
     * @param  Collection<int,Project>  $projects
     * @param  Collection<int,ExperienceItem>  $experience
     * @param  Collection<int,SocialLink>  $socials
     * @param  array<string,mixed>  $contact
     */
    public function __construct(
        public readonly array $owner,
        public readonly array $hero,
        public readonly array $about,
        public readonly Collection $skills,
        public readonly Collection $projects,
        public readonly Collection $experience,
        public readonly Collection $socials,
        public readonly array $contact,
    ) {
    }

    public static function fromConfig(): self
    {
        $config = config('portfolio');

        return new self(
            owner: $config['owner'] ?? [],
            hero: $config['hero'] ?? [],
            about: $config['about'] ?? [],
            skills: collect($config['skills'] ?? [])
                ->map(fn (array $group) => new SkillGroup(
                    name: $group['name'],
                    items: collect($group['items'] ?? [])->map(
                        fn (array $item) => new Skill($item['name'], $item['level'] ?? null)
                    )->values(),
                ))
                ->values(),
            projects: collect($config['projects'] ?? [])
                ->map(fn (array $p) => new Project(
                    title: $p['title'],
                    description: $p['description'],
                    tags: collect($p['tags'] ?? [])->values(),
                    image: $p['image'] ?? null,
                    liveUrl: $p['live_url'] ?? null,
                    repoUrl: $p['repo_url'] ?? null,
                    featured: (bool) ($p['featured'] ?? false),
                ))
                ->values(),
            experience: collect($config['experience'] ?? [])
                ->map(fn (array $x) => new ExperienceItem(
                    role: $x['role'],
                    organization: $x['organization'],
                    period: $x['period'],
                    location: $x['location'] ?? null,
                    summary: $x['summary'] ?? '',
                    achievements: collect($x['achievements'] ?? [])->values(),
                ))
                ->values(),
            socials: collect($config['socials'] ?? [])
                ->map(fn (array $s) => new SocialLink($s['label'], $s['url'], $s['icon'] ?? null))
                ->values(),
            contact: $config['contact'] ?? [],
        );
    }

    public function fullName(): string
    {
        return (string) ($this->owner['name'] ?? 'Your Name');
    }

    public function tagline(): string
    {
        return (string) ($this->owner['tagline'] ?? '');
    }

    public function featuredProjects(): Collection
    {
        $featured = $this->projects->filter(fn (Project $p) => $p->featured);

        return $featured->isEmpty() ? $this->projects : $featured->values();
    }
}
