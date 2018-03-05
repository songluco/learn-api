<?php
/**
 * Created by PhpStorm.
 * Author: SongLu
 * DateTime: 2018/3/5 上午11:38
 */

namespace App\Transform;


abstract class Transform
{
    public function transformCollection($items)
    {
        //在类文件中，调用类中的方法作为回调函数时
        return array_map([$this, 'transform'], $items);
    }

    abstract public function transform($item);

}