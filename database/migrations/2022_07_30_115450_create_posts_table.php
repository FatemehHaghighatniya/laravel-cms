<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('photo_id');
            $table->unsignedInteger('category_id');
            $table->tinyInteger('status')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['posts_user_id_foreign']);
            $table->dropIndex(['posts_user_id_foreign']);
            $table->dropForeign(['posts_photo_id_foreign']);
            $table->dropIndex(['posts_photo_id_foreign']);
            $table->dropForeign(['posts_category_id_foreign']);
            $table->dropIndex(['posts_category_id_foreign']);
            $table->integer('user_id')->change();
            $table->integer('photo_id')->change();
            $table->integer('category_id')->change();
            Schema::dropIfExists('posts');

        });
    }
}
