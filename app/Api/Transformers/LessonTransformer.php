<?php
/**
 * Created by PhpStorm.
 * Author: SongLu
 * DateTime: 2018/3/6 上午10:09
 */

namespace App\Api\Transformers;


use App\Lessons;
use League\Fractal\TransformerAbstract;

class LessonTransformer extends TransformerAbstract
{
    public function transform(Lessons $lesson)
    {
        return [
            'title' => $lesson['title'],
            'content' => $lesson['body'],
            'is_free' => (bool)$lesson['free']
        ];
    }

}