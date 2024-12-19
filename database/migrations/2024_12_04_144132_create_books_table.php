<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment("Название");
            $table->text('description')->comment('Описание');
            $table->string('cover_image_url')->nullable()->comment('Обложка');
            $table->unsignedBigInteger('status')->nullable();
            $table->foreign('status')->references('id')->on('books_status')->onDelete('cascade');
            $table->integer('likes')->default(0);
            $table->integer('views')->default(0);
            $table->integer('year_pub')->comment('Год публикации');
            $table->unsignedBigInteger('type')->nullable()->comment('Манга, Манхва');
            $table->foreign('type')->references('id')->on('books_types')->onDelete('cascade');
            $table->unsignedBigInteger('pg')->nullable();
            $table->foreign('pg')->references('id')->on('books_pgs')->onDelete('cascade');
            $table->timestamps();
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
