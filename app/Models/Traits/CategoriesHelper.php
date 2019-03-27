<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2019/3/18
 * Time: 15:15
 */

namespace App\Models\Traits;

use App\Models\Category;
use Carbon\Carbon;
use Cache;
use DB;


trait CategoriesHelper
{
    // 缓存相关配置
    protected $cache_key = 'categories_front';
    protected $cache_expire_in_minutes = 86400;


    //查询前端类别
    public function getCategories()
    {
        // 尝试从缓存中取出 cache_key 对应的数据。如果能取到，便直接返回数据。
        // 否则运行匿名函数中的代码来取出数据，返回的同时做了缓存。
        return Cache::remember($this->cache_key, $this->cache_expire_in_minutes, function(){
            return $this->_getCategories();
        });
    }


    private function _getCategories()
    {
        //分类
     return Category::select('id','name','count')->where('status','1')->orderBy('sort','desc')->get();
    }
}