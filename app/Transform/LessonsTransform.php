<?php
/**
 * Created by PhpStorm.
 * Author: SongLu
 * DateTime: 2018/3/5 上午11:41
 */

namespace App\Transform;


class LessonsTransform extends Transform
{
    public function transform($item)
    {
        return [
            'title' => $item['title'],
            'content' => $item['body'],
            'is_free' => (bool)$item['free']
        ];
    }

}