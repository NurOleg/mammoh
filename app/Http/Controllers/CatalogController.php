<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Reducer;
use App\Models\Serie;
use App\Service\CatalogService;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

final class CatalogController extends Controller
{
    public function __construct(
        private CatalogService $catalogService,
    ) {}

    public function index(string $slug): View
    {
        /** @var Serie $serie */
        $serie = Serie::query()->where('slug', '=', $slug)->first();
        $gearRatioFilter = $this->catalogService->getRatioFilterBySerieId($serie->id);
        $torqueFilter = $this->catalogService->getTorqueFilterBySerieId($serie->id);
        $reducers = Reducer::query()->with('gear_ratios')->paginate(10);

        return view(
            'catalog.serie',
            compact(
                'serie',
                'gearRatioFilter',
                'torqueFilter',
                'reducers'
            )
        );
    }

    public function show(string $slug, int $reducer_id): View
    {
        /** @var Reducer $reducer */
        $reducer = Reducer::query()
            ->with(['gear_ratios', 'serie'])
            ->whereHas('serie', function (Builder $serieBuilder) use ($slug) {
                $serieBuilder->where('slug', '=', $slug);
            })
            ->findOrFail($reducer_id);

        /** @var Reducer[] $sameReducers */
        $sameReducers = Reducer::query()
            ->where('serie_id', '=', $reducer->serie->id)
            ->whereNot('id', $reducer->id)
            ->take(10)
            ->get();

        return view(
            'catalog.detail',
            compact(
                'reducer',
                'sameReducers',
            )
        );
    }

    public function configurator(int $reducer_id): View
    {
        /** @var Reducer $reducer */
        $reducer = Reducer::query()
            ->with([
                'gear_ratios',
                'build_options',
                'shafts',
                'default_input_shaft',
                'default_output_shaft'
            ])
            ->findOrFail($reducer_id);

        return view('catalog.configurator', compact('reducer'));
    }
}
