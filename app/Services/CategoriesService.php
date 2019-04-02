<?php
/**
 * Created by PhpStorm.
 * User: chenshuai
 * Date: 2019/3/18
 * Time: 15:24
 */

namespace App\Services;

use App\Models\Category;
use App\Models\Topic;

class CategoriesService
{
    public $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategories()
    {
        return $this->category->getCategories();
    }


    public function getTopicsByCateName($cateName)
    {
        $cateInfo = Category::where('name_en',strtolower($cateName))->first()->topics()->orderBy('id','desc')->get();
    }

}