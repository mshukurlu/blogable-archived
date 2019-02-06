<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogAbleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogable', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text("text");
            $table->unsignedInteger("user_id");
            $table->string('slug');
            $table->string('type'); //post or page
            $table->boolean('is_published');
            $table->string('comment_status')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogable');
    }
}
