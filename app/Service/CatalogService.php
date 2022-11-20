<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\PropertyGearRatio;
use App\Models\Reducer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class CatalogService
{
    public function getRatioFilterBySerieId(int $serieId): Collection
    {
        return PropertyGearRatio::query()
            ->whereHas('reducers', function (Builder $reducersBuilder) use ($serieId) {
            $reducersBuilder->where('serie_id', '=', $serieId);
        })->get()->pluck('value', 'id');
    }

    public function getTorqueFilterBySerieId(int $serieId): Collection
    {
        return Reducer::query()
            ->where('serie_id', '=', $serieId)
            ->get()->pluck('rated_output_torque');
    }
}
