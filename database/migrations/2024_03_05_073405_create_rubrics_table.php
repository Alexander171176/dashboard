<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rubrics', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Заголовок рубрики
            $table->string('url', 255)->unique(); // Адрес рубрики
            $table->string('image_url', 255)->nullable()->default(''); // Адрес изображения
            $table->string('seo_title')->nullable()->default(''); // Title изображения
            $table->string('seo_alt')->nullable()->default(''); // Title изображения
            $table->text('description')->nullable()->default(''); // Описание рубрики
            $table->string('meta_title')->nullable()->default(''); // meta title
            $table->string('meta_keywords')->nullable()->default(''); // meta keywords
            $table->string('meta_desc')->nullable()->default(''); // meta description
            $table->integer('sort')->nullable()->default(0); // Поле для хранения порядка сортировки рубрик

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rubrics');
    }
};
