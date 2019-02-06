<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogAblePostMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogable_postmeta', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('blogable_id');
            $table->string("meta_key");
            $table->longText('meta_value')->nullable();
            $table->string('comment_status')->nullable();
            $table->timestamps();

            $table->foreign('blogable_id')->references('id')->on('blogable')->onDelete('cascade');

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
