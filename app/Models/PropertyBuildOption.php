<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property-read int $id
 * @property int $value
 */
final class PropertyBuildOption extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function reducers(): BelongsToMany
    {
        return $this->belongsToMany(
            Reducer::class,
            'property_build_options_reducers',
            'property_build_option_id',
            'reducer_id'
        );
    }
}
