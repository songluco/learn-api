<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    //使用hidden属性，隐藏掉数据库中的某些字段
    protected $hidden = ['created_at', 'updated_at'];

//    protected $fillable = ['title', 'body'];

    protected $guarded = [];
}
