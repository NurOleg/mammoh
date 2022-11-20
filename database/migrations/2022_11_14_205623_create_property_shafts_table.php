<?php

declare(strict_types=1);

use App\Models\PropertyShaft;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_shafts', function (Blueprint $table) {
            $table->id();
            $table->string('value');
        });

        $values = [
            'Конический',
            'Датчик обратной связи',
            'Зубчатая муфта',
            'Полый Шлицевой',
            'Полый Шпоночный',
            'Цилиндрический Шлицевой',
            'Цилиндрический',
        ];

        foreach ($values as $value) {
            $prop = new PropertyShaft();
            $prop->value = $value;
            $prop->save();
        }

        Schema::table('reducers', function (Blueprint $table) {
            $table
                ->unsignedBigInteger('default_input_shaft_id')
                ->nullable(false)
                ->default(1);
            $table
                ->unsignedBigInteger('default_output_shaft_id')
                ->nullable(false)
                ->default(1);
        });

        Schema::create('property_shafts_reducers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reducer_id')->nullable(false);
            $table->unsignedBigInteger('property_shaft_option_id')->nullable(false);
        });

        Schema::table('property_shafts_reducers', function (Blueprint $table) {
            $table
                ->foreign('reducer_id', 'pivot_shaft_to_reducers_fk')
                ->references('id')
                ->on('reducers');
            $table
                ->foreign('property_shaft_option_id', 'pivot_to_prop_shaft_option_fk')
                ->references('id')
                ->on('property_shafts');
        });
    }

    public function down(): void
    {
        Schema::table('property_shafts_reducers', function (Blueprint $table) {
            $table->dropForeign('pivot_shaft_to_reducers_fk');
            $table->dropForeign('pivot_to_prop_shaft_option_fk');
        });
        Schema::dropIfExists('property_shafts_reducers');
        Schema::dropIfExists('property_shafts');
    }
};
