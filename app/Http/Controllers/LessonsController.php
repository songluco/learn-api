<?php

namespace App\Http\Controllers;

use App\Lessons;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;

/**
 * 课程相关控制器
 * Class LessonsController
 * Author: SongLu
 * @package App\Http\Controllers
 */
class LessonsController extends Controller
{

    /**
     * 课程列表页信息
     * @return array
     * @author: SongLu
     */
    public function getIndex()
    {
        //获取所有课程信息
        /** @var  $lessons Lessons */
        $lessons = Lessons::all();
        return [
            'code' => 200,
            'msg' => 'success',
            'data' => $this->transformCollection($lessons)
        ];
    }


    /**
     * 单个课程详细信息
     * @param integer $id 课程ID
     *
     * @return array
     * @author: SongLu
     */
    public function getShow($id)
    {
        $lesson = Lessons::findOrFail($id);
        return [
            'code' => 200,
            'msg' => 'success',
            'data' => $this->transform($lesson)
        ];

    }


    /**
     * 集合数据转换方法
     * @param $lessons
     *
     * @return array
     * @author: SongLu
     */
    public function transformCollection($lessons)
    {
        //在类文件中，调用类中的方法作为回调函数时
        return array_map([$this, 'transform'], $lessons->toArray());
    }


    /**
     * eloquent数据转换方法
     * @param $lesson
     *
     * @return array
     * @author: SongLu
     */
    public function transform($lesson)
    {
        return [
            'title' => $lesson['title'],
            'content' => $lesson['body'],
            'is_free' => (bool)$lesson['free']
        ];
    }

}

