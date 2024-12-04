<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Создаёт поле id с автоинкрементом
            $table->string('title');
            $table->text('description')->comment('Content of the post');
            $table->string('cover_image_url')->nullable();
            $table->string('status')->comment('Состояние перевода');
            $table->integer('user_id');
            $table->integer('likes')->default(0);
            $table->integer('views')->default(0);
            $table->integer('year_pub')->comment('Год публикации');
            $table->integer('pg')->comment('Возрастное ограничение');
            $table->timestamps(); // Создаёт поля created_at и updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};
