<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedDataToMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $menus = [
            [
                'name' => 'php',
                'url'  =>  '/',
                'pid'  => '0',
                'nav_id' => '1',
            ],
            [
                'name' => 'go',
                'url'  =>  '/',
                'pid'  => '0',
                'nav_id' => '1',
            ],
            [
                'name' => 'laravel',
                'url'  =>  '/',
                'pid'  => '0',
                'nav_id' => '1',
            ]
        ];

        DB::table('menus')->insert($menus);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('menus')->truncate();
    }
}
