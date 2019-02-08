<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->index()->comment('主键id');
            $table->string('name')->index()->comment('中文名称');
            $table->string('name_en')->index()->comment('英文名称');
            $table->text('description')->nullable()->comment('栏目描述');
            $table->integer('count')->default(0)->comment('帖子总数');
            $table->tinyInteger('sort')->default(1)->comment('栏目排序');
            $table->tinyInteger('status')->default(1)->comment('栏目状态 1 导航可见  2导航不可见');
            $table->tinyInteger('nav_id')->default(0)->comment('栏目对应导航id');
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
        Schema::dropIfExists('categories');
    }
}
