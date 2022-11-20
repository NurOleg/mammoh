<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reducers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->string('transmission_type')->comment('Тип передачи');
            $table->string('number_of_transmission_stages')->comment('Количество ступеней передачи');
            $table->string('axle_arrangement')->comment('Расположение осей');
            $table->text('overall');
            $table->longText('info');
            $table->unsignedSmallInteger('weight')->comment('Масса');
            $table->unsignedSmallInteger('total_center_distance')->comment('Суммарное межосевое расстояние, мм');
            $table->unsignedSmallInteger('rated_output_torque')->comment('Номинальный крутящий момент на выходном валу, Н*м');
            $table->decimal('efficiency', 3)->comment('КПД');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('reducers');
    }
};
