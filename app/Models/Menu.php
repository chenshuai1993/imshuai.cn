<?php

namespace App\Models;

use App\Models\Traits\MenuHelper;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    use MenuHelper;

   protected $fillable = ['id', 'name', 'url'];
}
