<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    //api接口code码
    protected $code = 200;

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param $code
     *
     * @return $this
     * @author: SongLu
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }


    /**
     * 未找到信息
     * @param string $msg
     *
     * @return array
     * @author: SongLu
     */
    public function responseNotFind($msg = 'not find')
    {
        return $this->setCode(404)->responseError($msg);
    }

    /**
     * 未找到信息：错误输出
     * @param $msg
     *
     * @return array
     * @author: SongLu
     */
    public function responseError($msg)
    {
        $data = [
            'code' => $this->getCode(),
            'msg' => $msg,
            'data' => []
        ];
        return $this->response($data);
    }

    /**
     * 输出
     * @param $data
     *
     * @return mixed
     * @author: SongLu
     */
    public function response($data)
    {
        return $data;
    }

}
