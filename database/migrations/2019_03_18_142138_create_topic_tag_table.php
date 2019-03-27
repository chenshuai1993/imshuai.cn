<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_tag', function (Blueprint $table) {
            $table->increments('id')->comment('topice_tag主键id');
            $table->integer('topice_id')->comment('topice主键id');
            $table->integer('tag_id')->comment('tag 表id');
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
        Schema::dropIfExists('topic_tag');
    }
}
