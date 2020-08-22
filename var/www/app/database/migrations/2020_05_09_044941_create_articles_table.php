<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('article_title')->nullable();
            $table->string('book_title')->nullable();
            $table->Integer('book_evaluation')->nullable();
            $table->text('book_content')->nullable();
            $table->text('book_impression')->nullable();
            $table->Integer('book_price')->nullable();
            $table->date('read_at')->nullable();
            $table->Integer('display_flg');
            $table->Integer('delete_flg');
            $table->text('url')->nullable();
            $table->dateTime('create_at');
            $table->date('update_at')->nullable();
            $table->date('delete_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
