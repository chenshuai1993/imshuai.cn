<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2019/3/29
 * Time: 09:59
 */

namespace App\Models\Traits;

use Cache;
use App\Models\Nav;



trait MenuHelper
{
    // 缓存相关配置
    protected $cache_key = 'menus_front';
    protected $cache_expire_in_minutes = 1;


    //查询前端类别
    public function getMenus()
    {
        // 尝试从缓存中取出 cache_key 对应的数据。如果能取到，便直接返回数据。
        // 否则运行匿名函数中的代码来取出数据，返回的同时做了缓存。
        return Cache::remember($this->cache_key, $this->cache_expire_in_minutes, function(){
            return $this->_getMenus();
        });


    }


    private function _getMenus()
    {
        $_navs = [];
        $navs = Nav::where('status','1')->orderBy('sort','asc')->get();

        foreach ($navs as $index =>  $nav){
            $_navs[$index]['name'] =  $nav->name;
            $_navs[$index]['data'] =  $nav->menus->toArray();
        }

        return $_navs;
    }
}