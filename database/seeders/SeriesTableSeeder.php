<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Serie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

final class SeriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = Storage::putFileAs(
            'series',
            'https://mammoh.com/images/catalog/series/ZDY138.png',
            'zdy-serie.png'
        );

        $serie = new Serie();
        $serie->slug = 'zdy-serie';
        $serie->name = 'ZDY-серия';
        $serie->preview_text = 'цилиндрический редуктор одноступенчатый';
        $serie->preview_image_url = $filePath;
        $serie->created_at = Carbon::now();
        $serie->updated_at = Carbon::now();

        $serie->save();
    }
}
