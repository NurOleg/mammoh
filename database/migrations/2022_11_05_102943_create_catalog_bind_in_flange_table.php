<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::raw(
            "CREATE TABLE `catalog_bind_in_flange` (
                    `id_product_group` int(11) NOT NULL DEFAULT 0,
                    `id_reducer_type` int(11) NOT NULL DEFAULT 0,
                    `id_reducer_size` int(11) NOT NULL DEFAULT 0,
                    `id_reducer_ratio` int(11) NOT NULL DEFAULT 0,
                    `id_reducer_param` int(11) NOT NULL DEFAULT 0,
                    `id_in_flange` int(11) NOT NULL DEFAULT 0,
                    `id_bind_in_flange` int(10) UNSIGNED NOT NULL,
                    `activ_label` enum('y','n') NOT NULL DEFAULT 'y'
                )"
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('catalog_bind_in_flange');
    }
};
