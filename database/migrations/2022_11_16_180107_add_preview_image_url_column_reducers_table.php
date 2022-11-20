<?php

declare(strict_types=1);

use App\Models\Reducer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reducers', function (Blueprint $table) {
           $table->string('preview_image_url');
        });

        foreach (Reducer::all() as $reducer) {
            $filePath = Storage::putFileAs(
                'reducers',
                'https://phenomenal-cocada-29cd77.netlify.app/resources/images/product-page-slider-main-img.png',
                $reducer->title . '.png'
            );

            /** @var Reducer $reducer */
            $reducer->preview_image_url = $filePath;
            $reducer->save();
        }
    }

    public function down(): void
    {
    }
};
