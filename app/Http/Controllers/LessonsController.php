<?php

namespace App\Http\Controllers;

use App\Lessons;
use App\Transform\LessonsTransform;
use Illuminate\Http\Request;

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
        $this->middleware('auth.basic', ['only' => ['postAddLesson', 'updateLesson']]);
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


    /**
     * 添加课程信息
     * @param Request $request
     *
     * @return array|mixed
     * @author: SongLu
     */
    public function postAddLesson(Request $request)
    {
        if(!$request->get('title') || !$request->get('body')){
            return $this->setCode(422)->responseError('validate fails!');
        }

        //create方法参数为数组
        Lessons::create($request->all());
        return $this->setCode(201)->response(
            [
                'code' => $this->getCode(),
                'msg' => 'lesson create success!',
                'data' => []
            ]
        );

    }

    public function updateLesson(Request $request)
    {
        dd('update');
    }

}

