<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->text('description');
            $table->unsignedInteger('parent_id')->nullable();
            $table->tinyInteger('status');
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
        schema::table('comments',function(Blueprint $table){
            $table->dropForeign(['comments_post_id_foreign']);
            $table->dropIndex(['comments_post_id_foreign']);
            $table->unsignedInteger('post_id')->change();
        Schema::dropIfExists('comments');
        });
    }
}
