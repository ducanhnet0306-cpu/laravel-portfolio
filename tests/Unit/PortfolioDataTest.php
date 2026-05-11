<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Data\PortfolioData;
use App\Data\Project;
use Tests\TestCase;

class PortfolioDataTest extends TestCase
{
    public function test_it_builds_from_config(): void
    {
        $portfolio = PortfolioData::fromConfig();

        $this->assertNotEmpty($portfolio->fullName());
        $this->assertGreaterThan(0, $portfolio->skills->count());
        $this->assertGreaterThan(0, $portfolio->projects->count());
        $this->assertContainsOnlyInstancesOf(Project::class, $portfolio->projects->all());
    }

    public function test_featured_projects_falls_back_to_all_when_none_featured(): void
    {
        config()->set('portfolio.projects', [[
            'title'       => 'Demo',
            'description' => 'x',
            'tags'        => ['a'],
            'featured'    => false,
        ]]);

        $portfolio = PortfolioData::fromConfig();

        $this->assertSame(1, $portfolio->featuredProjects()->count());
    }
}
