<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property float $value
 */
final class PropertyGearRatio extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'property_gear_ratio';

    public function reducers(): BelongsToMany
    {
        return $this->belongsToMany(
            Reducer::class,
            'property_gear_ratio_reducers',
            'property_gear_ratio_id',
            'reducer_id'
        );
    }
}
