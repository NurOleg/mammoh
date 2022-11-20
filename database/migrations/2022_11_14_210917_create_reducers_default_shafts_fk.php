<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reducers', function (Blueprint $table) {
            $table
                ->foreign('default_input_shaft_id', 'default_input_shaft_reducers_fk')
                ->references('id')
                ->on('property_shafts');
            $table
                ->foreign('default_output_shaft_id', 'default_output_shaft_reducers_fk')
                ->references('id')
                ->on('property_shafts');
        });
    }

    public function down(): void
    {
        Schema::table('reducers', function (Blueprint $table) {
            $table->dropForeign('default_input_shaft_reducers_fk');
            $table->dropForeign('default_output_shaft_reducers_fk');
        });
    }
};
