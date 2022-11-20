<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property string $preview_text
 * @property string $preview_image_url
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
final class Serie extends Model
{
    use HasFactory;
}
