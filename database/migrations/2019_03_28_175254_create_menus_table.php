<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('菜单名称');
            $table->string('url')->comment('导航对应的地址');
            $table->integer('pid')->default(0)->comment('菜单Pid');
            $table->integer('nav_id')->comment('导航id');
            $table->integer('sort')->default(1)->comment('菜单排序');
            $table->integer('status')->default(1)->comment('菜单状态，0 不可用， 1 可用');
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
        Schema::dropIfExists('menus');
    }
}
