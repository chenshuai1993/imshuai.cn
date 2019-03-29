<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedDataToNav extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $navs = [
            [
                'name' => '后端',
                'sort'  => 1,
                'status'  => 1,
            ],
            [
                'name' => '分享',
                'sort'  => 1,
                'status'  => 1,
            ],

        ];

        DB::table('navs')->insert($navs);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::table('navs')->truncate();
    }
}
