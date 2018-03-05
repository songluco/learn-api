<?php

namespace App\Http\Controllers;

use App\Lessons;
use App\Transform\LessonsTransform;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Response;

/**
 * 课程相关控制器
 * Class LessonsController
 * Author: SongLu
 * @package App\Http\Controllers
 */
class LessonsController extends ApiController
{

    /** @var LessonsTransform 数据转换类 */
    protected $lessonTransform;

    /**
     * LessonsController constructor.
     * @param $lessonTransform
     */
    public function __construct(LessonsTransform $lessonTransform)
    {
        $this->lessonTransform = $lessonTransform;
    }

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
        $data = [
            'code' => 200,
            'msg' => 'success',
            'data' => $this->lessonTransform->transformCollection($lessons->toArray())
        ];
        return $this->response($data);
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
        $lesson = Lessons::find($id);

        if(!$lesson){
            return $this->responseNotFind();
        }

        return $this->response([
            'code' => $this->getCode(),
            'msg' => 'success',
            'data' => $lesson
        ]);
    }

}

