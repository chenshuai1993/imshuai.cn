<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration 
{
	public function up()
	{
		Schema::create('replies', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('topic_id')->unsigned()->default(0)->index()->comment('帖子id');
            $table->integer('user_id')->unsigned()->default(0)->index()->comment('用户id');
            $table->text('content')->comment('回复内容');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('replies');
	}
}
