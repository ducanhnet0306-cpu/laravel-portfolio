<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Data\PortfolioData;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class PortfolioController extends Controller
{
    public function __construct(private readonly PortfolioData $portfolio)
    {
    }

    /** Single-page portfolio. */
    public function index(): View
    {
        return view('portfolio.index', [
            'portfolio' => $this->portfolio,
        ]);
    }

    /** Detail page for an individual project (looked up by slug). */
    public function showProject(string $slug): View
    {
        $project = $this->portfolio->projects->firstWhere(
            fn ($p) => $p->slug() === $slug
        );

        abort_if($project === null, 404);

        return view('portfolio.project', [
            'project' => $project,
        ]);
    }
}
