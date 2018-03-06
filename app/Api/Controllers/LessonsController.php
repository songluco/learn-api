<?php
/**
 * Created by PhpStorm.
 * Author: SongLu
 * DateTime: 2018/3/6 上午9:57
 */

namespace App\Api\Controllers;


use App\Api\Transformers\LessonTransformer;
use App\Lessons;

class LessonsController extends BaseController
{

    public function index()
    {
        $lessons = Lessons::all();
        return $this->collection($lessons, new LessonTransformer());
    }

}