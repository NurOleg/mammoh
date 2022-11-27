<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', static function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('slug')->unique()->nullable(false);
            $table->longText('description')->nullable(false);
            $table->string('preview_image_url')->nullable(false);
            $table->boolean('is_published')->default(false)->nullable(false);
            $table->unsignedBigInteger('reducer_id')->nullable(true)->default(null);
            $table->timestamp('published_at');
            $table->timestamps();
        });

        Schema::table('articles', static function (Blueprint $table) {
            $table
                ->foreign('reducer_id', 'article_reducer_fk')
                ->references('id')
                ->on('reducers');
        });
    }

    public function down(): void
    {
        Schema::table('articles', static function (Blueprint $table) {
            $table->dropForeign('article_reducer_fk');
        });

        Schema::dropIfExists('articles');
    }
};
