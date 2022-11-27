<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id
 * @property int|null $reducer_id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $preview_image_url
 * @property boolean $is_published
 * @property Carbon $published_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Reducer|null $reducer
 */
final class Article extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'datetime'
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function reducer(): BelongsTo
    {
        return $this->belongsTo(Reducer::class);
    }
}
