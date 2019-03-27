<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration 
{
	public function up()
	{
		Schema::create('topics', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index()->comment('标题');
            $table->text('body')->comment('内容');
            $table->integer('user_id')->unsigned()->index()->comment('用户id');
            $table->integer('category_id')->unsigned()->index()->comment('栏目id');
            $table->integer('reply_count')->unsigned()->default(0)->comment('回复的数量');
            $table->integer('view_count')->unsigned()->default(0)->comment('查看数量');
            $table->integer('last_reply_user_id')->unsigned()->default(0)->comment('最后回复的用户id');
            $table->integer('order')->unsigned()->default(0)->comment('排序');
            $table->text('excerpt')->nullable()->comment('简介');
            $table->string('slug')->nullable()->comment('url友好');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('topics');
	}
}
