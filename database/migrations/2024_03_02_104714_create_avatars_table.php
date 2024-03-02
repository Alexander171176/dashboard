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
        Schema::create('avatars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Добавляем столбец для связи с пользователем
            $table->string('path'); // Добавляем столбец для хранения пути к файлу аватара
            $table->timestamps();

            // Определяем внешний ключ для связи с таблицей пользователей
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avatars');
    }
};
