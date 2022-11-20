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
        CREATE TABLE `catalog_reducer_size` (
  `id_product_group` int(11) NOT NULL DEFAULT '0',
  `id_reducer_type` int(11) NOT NULL DEFAULT '0',
  `id_reducer_size` int(10) UNSIGNED NOT NULL,
  `t1` varchar(10) NOT NULL DEFAULT '',
  `r1_weight` decimal(12,2) NOT NULL DEFAULT '0.00'
)
        ");

        DB::statement("
        INSERT INTO `catalog_reducer_size` (`id_product_group`, `id_reducer_type`, `id_reducer_size`, `t1`, `r1_weight`) VALUES
(6, 1, 1, '57', '8.00'),
(6, 1, 2, '67', '14.00'),
(6, 1, 3, '77', '23.00'),
(6, 1, 4, '87', '39.00'),
(6, 1, 5, '97', '70.00'),
(6, 1, 6, '107', '100.00'),
(6, 2, 9, '27', '5.50'),
(6, 2, 10, '37', '8.50'),
(6, 2, 11, '47', '10.00'),
(6, 2, 12, '57', '18.00'),
(6, 2, 13, '67', '25.00'),
(6, 2, 14, '77', '36.00'),
(6, 2, 15, '87', '63.00'),
(6, 2, 16, '97', '101.00'),
(6, 2, 17, '107', '153.00'),
(6, 2, 18, '137', '220.00'),
(6, 2, 19, '147', '400.00'),
(6, 2, 20, '167', '700.00'),
(5, 3, 21, '37', '11.00'),
(5, 3, 22, '47', '20.00'),
(5, 3, 23, '57', '27.00'),
(5, 3, 24, '67', '33.00'),
(5, 3, 25, '77', '57.00'),
(5, 3, 26, '87', '85.00'),
(5, 3, 27, '97', '130.00'),
(5, 3, 28, '107', '250.00'),
(5, 3, 29, '127', '380.00'),
(5, 3, 30, '157', '610.00'),
(5, 3, 31, '167', '1015.00'),
(5, 3, 32, '187', '1700.00'),
(4, 4, 33, '37', '13.00'),
(4, 4, 34, '47', '18.00'),
(4, 4, 35, '57', '34.00'),
(4, 4, 36, '67', '55.00'),
(4, 4, 37, '77', '90.00'),
(4, 4, 38, '87', '150.00'),
(4, 4, 39, '97', '260.00'),
(4, 4, 40, '107', '402.00'),
(4, 4, 41, '127', '700.00'),
(4, 4, 42, '157', '950.00'),
(3, 5, 43, '31,5', '24.00'),
(3, 5, 44, '40', '35.00'),
(3, 5, 45, '50', '53.00'),
(1, 6, 46, '25', '0.70'),
(1, 6, 47, '30', '1.20'),
(1, 6, 48, '40', '2.30'),
(1, 6, 49, '50', '3.50'),
(1, 6, 50, '63', '6.20'),
(1, 6, 51, '75', '9.00'),
(1, 6, 52, '90', '13.00'),
(1, 6, 53, '110', '35.00'),
(1, 6, 54, '130', '53.00'),
(1, 6, 55, '150', '84.00'),
(1, 7, 56, '30', '1.20'),
(1, 7, 57, '40', '2.30'),
(1, 7, 58, '50', '3.50'),
(1, 7, 59, '63', '6.20'),
(1, 7, 60, '75', '9.00'),
(1, 7, 61, '90', '13.00'),
(1, 7, 62, '110', '35.00'),
(1, 7, 63, '130', '53.00'),
(1, 7, 64, '150', '84.00');
        ");
    }

    public function down(): void
    {
        Schema::dropIfExists('catalog_reducer_size');
    }
};
