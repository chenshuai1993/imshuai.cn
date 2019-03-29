<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Nav extends Model
{
    protected $fillable = ['id','name'];

    //获取多个menus
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
