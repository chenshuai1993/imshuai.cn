<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $categories = [
            [
                'name'        => 'PHP',
                'name_en'     => 'php',
                'description' => '这是一个描述for php',
            ],
            [
                'name'        => 'GO',
                'name_en'     => 'go',
                'description' => '这是一个描述for go',
            ],
            [
                'name'        => 'Python',
                'name_en'     => 'Python',
                'description' => '这是一个描述for Python',
            ],
            [
                'name'        => 'Git',
                'name_en'     => 'Git',
                'description' => '这是一个描述for Git',
            ],
            [
                'name'        => 'Javascript',
                'name_en'     => 'Javascript',
                'description' => '这是一个描述for Javascript',
            ],
            [
                'name'        => 'MySql',
                'name_en'     => 'MySql',
                'description' => '这是一个描述for MySql',
            ],
            [
                'name'        => 'Linux',
                'name_en'     => 'Linux',
                'description' => '这是一个描述for Linux',
            ],
            [
                'name'        => 'Nginx',
                'name_en'     => 'Nginx',
                'description' => '这是一个描述for Nginx',
            ],
            [
                'name'        => '架构',
                'name_en'     => '架构',
                'description' => '这是一个描述for 架构',
            ],
            [
                'name'        => '资料下载',
                'name_en'     => '资料下载',
                'description' => '这是一个描述for 资料下载',
            ],
            [
                'name'        => '计算机原理',
                'name_en'     => '计算机原理',
                'description' => '这是一个描述for 计算机原理',
            ],
            [
                'name'        => '随笔',
                'name_en'     => '随笔',
                'description' => '这是一个描述for 随笔',
            ],
            [
                'name'        => '公告',
                'name_en'     => 'Bulletin',
                'description' => '站点公告',
            ],


        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::table('categories')->truncate();
    }
}
