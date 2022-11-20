<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
        CREATE TABLE `catalog_reducer_type` (
  `id_product_group` int(11) NOT NULL DEFAULT '0',
  `id_reducer_type` int(10) UNSIGNED NOT NULL,
  `name_reducer_type` varchar(20) NOT NULL DEFAULT '',
  `fullname_reducer_type` varchar(100) NOT NULL DEFAULT ''
)
        ");

        DB::statement(
            "
                INSERT INTO `catalog_reducer_type` (`id_product_group`, `id_reducer_type`, `name_reducer_type`, `fullname_reducer_type`) VALUES
(6, 1, 'RX', ''),
(6, 2, 'R', ''),
(5, 3, 'K', ''),
(4, 4, 'F', ''),
(3, 5, '3МП', ''),
(1, 6, 'NMRV', ''),
(1, 7, 'NRV', '');
            "
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('catalog_reducer_type');
    }
};
