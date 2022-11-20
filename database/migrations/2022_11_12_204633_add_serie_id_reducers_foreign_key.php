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
           $table->unsignedBigInteger('serie_id')->nullable(false);
        });

        Schema::table('reducers', function (Blueprint $table) {
            $table
                ->foreign('serie_id')
                ->references('id')
                ->on('series');
        });
    }


    public function down(): void
    {
        //
    }
};
