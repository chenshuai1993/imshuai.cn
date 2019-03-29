<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2019/3/18
 * Time: 15:24
 */

namespace App\Services;

use App\Models\Menu;

class NavsService
{

    //getnav
    public function getNavs()
    {
        return (new Menu())->getMenus();
    }

}