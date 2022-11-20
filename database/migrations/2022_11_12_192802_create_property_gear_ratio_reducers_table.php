<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_gear_ratio_reducers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reducer_id')->nullable(false);
            $table->unsignedBigInteger('property_gear_ratio_id')->nullable(false);
        });

        Schema::table('property_gear_ratio_reducers', function (Blueprint $table) {
            $table
                ->foreign('reducer_id', 'pivot_to_reducers_fk')
                ->references('id')
                ->on('reducers');
            $table
                ->foreign('property_gear_ratio_id', 'pivot_to_prop_gear_ratio_fk')
                ->references('id')
                ->on('property_gear_ratio');
        });
    }

    public function down(): void
    {
        Schema::table('property_gear_ratio_reducers', function (Blueprint $table) {
            $table->dropForeign('pivot_to_reducers_fk');
            $table->dropForeign('pivot_to_prop_gear_ratio_fk');
        });

        Schema::dropIfExists('property_gear_ratio_reducers');
    }
};
