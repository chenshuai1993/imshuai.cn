<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    protected $fillable = ['name'];


    //tags 对应的 帖子
    public function Topics()
    {
        return $this->belongsToMany(Topic::class,'topic_tag','tag_id','topice_id');
    }
}
