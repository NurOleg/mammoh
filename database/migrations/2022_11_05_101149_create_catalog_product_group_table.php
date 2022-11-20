<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE TABLE `catalog_product_group` (
                    `id_product_group` int(10) UNSIGNED NOT NULL,
                    `name` varchar(100) NOT NULL DEFAULT '',
                    `name_product_group` varchar(100) NOT NULL DEFAULT '',
                    `preview_text` varchar(255),
                    `preview_image_url` varchar(255)
                )"
        );

        DB::statement(
            "INSERT INTO `catalog_product_group` (`id_product_group`, `name`, `name_product_group`) VALUES
                    (1, '', 'Червячные редукторы'),
                    (2, '', 'Электродвигатели'),
                    (3, '', 'Планетарные редукторы'),
                    (4, '', 'Цилиндрические редукторы'),
                    (5, '', 'Коническо-цилиндрические редукторы'),
                    (6, '', 'Цилиндрические редукторы');
                "
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog_catalog_product_group');
    }
};
