<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use Traits\CategoriesHelper; //引入模型

    //
    protected $fillable = [
    	'name','name_en','description',
    ];


}
