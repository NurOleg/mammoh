<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('article_tag', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id')->nullable(false);
            $table->unsignedBigInteger('tag_id')->nullable(false);
        });

        Schema::table('article_tag', static function (Blueprint $table) {
            $table
                ->foreign('article_id', 'articles_tags_article_fk')
                ->references('id')
                ->on('articles');
            $table
                ->foreign('tag_id', 'articles_tags_tag_fk')
                ->references('id')
                ->on('tags');
        });
    }

    public function down(): void
    {
        Schema::table('article_tag', static function (Blueprint $table) {
            $table->dropForeign('articles_tags_article_fk');
            $table->dropForeign('articles_tags_tag_fk');
        });
        Schema::dropIfExists('article_tag');
    }
};
