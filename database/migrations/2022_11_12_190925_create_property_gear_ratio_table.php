<?php

declare(strict_types=1);

use App\Models\PropertyGearRatio;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('property_gear_ratio', function (Blueprint $table) {
            $table->id();
            $table->decimal('value', 4);
        });

        $values = [
            1.25,
            1.4,
            1.6,
            1.8,
            2,
            2.24,
            2.5,
            2.8,
            3.15,
            3.55,
            4,
            4.5,
            5,
            5.6,
            6.3,
        ];

        foreach ($values as $value) {
            $property = new PropertyGearRatio();
            $property->value = $value;
            $property->save();
        }

    }

    public function down(): void
    {
        Schema::dropIfExists('property_gear_ratio');
    }
};
