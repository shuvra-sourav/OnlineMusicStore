<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title',  500);
            $table->string('slug', 300)->nullable();

            $table->unsignedBigInteger('album_id')->nullable();
            $table->unsignedBigInteger('lyricist_id')->nullable();
            $table->unsignedBigInteger('composer_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();

            $table->string('youtube_id', 20)->nullable();
            $table->string('cover_image', 100)->nullable();

            $table->year('release_year')->nullable();
            $table->timestamps();

            $table->index('title');

            $table->foreign('album_id')   ->references('id')->on('albums');
            $table->foreign('lyricist_id')->references('id')->on('lyricists');
            $table->foreign('composer_id')->references('id')->on('composers');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
