<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use Traits\CategoriesHelper; //引入模型

    protected $table = 'categories';

    //
    protected $fillable = [
    	'name','name_en','description',
    ];


    //一个帖子属于一个分类
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }


}
