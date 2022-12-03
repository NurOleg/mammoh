<?php

declare(strict_types=1);

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id
 * @property string $title
 * @property string $subtitle
 * @property string $transmission_type
 * @property string $number_of_transmission_stages
 * @property string $axle_arrangement
 * @property string $overall
 * @property string $info
 * @property int $weight
 * @property int $total_center_distance
 * @property int $rated_output_torque
 * @property string $preview_image_url
 * @property float $efficiency
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
final class Reducer extends Model
{
    use HasFactory;
    use CrudTrait;

    public function serie(): BelongsTo
    {
        return $this->belongsTo(Serie::class);
    }

    public function gear_ratios(): BelongsToMany
    {
        return $this->belongsToMany(
            PropertyGearRatio::class,
            'property_gear_ratio_reducers',
            'reducer_id',
            'property_gear_ratio_id'
        );
    }

    public function build_options(): BelongsToMany
    {
        return $this->belongsToMany(
            PropertyBuildOption::class,
            'property_build_options_reducers',
            'reducer_id',
            'property_build_option_id'
        );
    }

    public function shafts(): BelongsToMany
    {
        return $this->belongsToMany(
            PropertyShaft::class,
            'property_shafts_reducers',
            'reducer_id',
            'property_shaft_option_id'
        );
    }

    public function default_input_shaft(): BelongsTo
    {
        return $this->belongsTo(
            PropertyShaft::class,
            'default_input_shaft_id'
        );
    }

    public function default_output_shaft(): BelongsTo
    {
        return $this->belongsTo(
            PropertyShaft::class,
            'default_output_shaft_id'
        );
    }
}
