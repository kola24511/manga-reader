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
            $table->unsignedBigInteger('status')->nullable();
            $table->foreign('status')->references('id')->on('status_books')->onDelete('cascade');
            $table->integer('likes')->default(0);
            $table->integer('views')->default(0);
            $table->integer('year_pub')->comment('Год публикации');
            $table->unsignedBigInteger('pg')->nullable();
            $table->foreign('pg')->references('id')->on('pg_lists')->onDelete('cascade');
            $table->timestamps(); // Создаёт поля created_at и updated_at
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['pg']); // Удаляем внешний ключ
        });
        Schema::dropIfExists('books');
    }
};
