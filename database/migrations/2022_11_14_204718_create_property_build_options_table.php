<?php

declare(strict_types=1);

use App\Models\PropertyBuildOption;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_build_options', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('value');
        });

        $values = [11, 12,13, 21, 22, 23, 31, 32, 33];

        foreach ($values as $value) {
            $prop = new PropertyBuildOption();
            $prop->value = $value;
            $prop->save();
        }

        Schema::create('property_build_options_reducers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reducer_id')->nullable(false);
            $table->unsignedBigInteger('property_build_option_id')->nullable(false);
        });

        Schema::table('property_build_options_reducers', function (Blueprint $table) {
            $table
                ->foreign('reducer_id', 'pivot_build_options_to_reducers_fk')
                ->references('id')
                ->on('reducers');
            $table
                ->foreign('property_build_option_id', 'pivot_to_prop_build_option_fk')
                ->references('id')
                ->on('property_build_options');
        });
    }

    public function down(): void
    {
        Schema::table('property_build_options_reducers', function (Blueprint $table) {
            $table->dropForeign('pivot_build_options_to_reducers_fk');
            $table->dropForeign('pivot_to_prop_build_option_fk');
        });

        Schema::dropIfExists('property_build_options_reducers');
        Schema::dropIfExists('property_build_options');
    }
};
