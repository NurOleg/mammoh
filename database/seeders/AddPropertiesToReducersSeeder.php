<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class AddPropertiesToReducersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('property_build_options_reducers')
            ->insert([
                [
                    'reducer_id' => 1,
                    'property_build_option_id' => 1,
                ],
                [
                    'reducer_id' => 1,
                    'property_build_option_id' => 2,
                ],
                [
                    'reducer_id' => 1,
                    'property_build_option_id' => 3,
                ],
                [
                    'reducer_id' => 1,
                    'property_build_option_id' => 4,
                ],
                [
                    'reducer_id' => 1,
                    'property_build_option_id' => 5,
                ],
                [
                    'reducer_id' => 1,
                    'property_build_option_id' => 6,
                ],
                [
                    'reducer_id' => 1,
                    'property_build_option_id' => 7,
                ],
            ]);

        DB::table('property_build_options_reducers')
            ->insert([
                [
                    'reducer_id' => 2,
                    'property_build_option_id' => 3,
                ],
                [
                    'reducer_id' => 2,
                    'property_build_option_id' => 4,
                ],
                [
                    'reducer_id' => 2,
                    'property_build_option_id' => 5,
                ],
                [
                    'reducer_id' => 2,
                    'property_build_option_id' => 6,
                ],
                [
                    'reducer_id' => 2,
                    'property_build_option_id' => 7,
                ],
                [
                    'reducer_id' => 2,
                    'property_build_option_id' => 8,
                ],
                [
                    'reducer_id' => 2,
                    'property_build_option_id' => 9,
                ],
            ]);

        DB::table('property_shafts_reducers')
            ->insert([
                [
                    'reducer_id' => 1,
                    'property_shaft_option_id' => 3,
                ],
                [
                    'reducer_id' => 1,
                    'property_shaft_option_id' => 4,
                ],
                [
                    'reducer_id' => 1,
                    'property_shaft_option_id' => 5,
                ],
                [
                    'reducer_id' => 1,
                    'property_shaft_option_id' => 6,
                ],
            ]);
        DB::table('property_shafts_reducers')
            ->insert([
                [
                    'reducer_id' => 2,
                    'property_shaft_option_id' => 2,
                ],
                [
                    'reducer_id' => 2,
                    'property_shaft_option_id' => 4,
                ],
                [
                    'reducer_id' => 2,
                    'property_shaft_option_id' => 5,
                ],
                [
                    'reducer_id' => 2,
                    'property_shaft_option_id' => 7,
                ],
            ]);
    }
}
