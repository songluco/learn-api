<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    protected $code = 200;

    /**
     * @return int
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

    public function response($data)
    {
        return $data;
    }

    public function responseError($msg = 'not find')
    {
        return $this->setCode(404)->responseNotFind($msg);
    }

    public function responseErrorTwo($msg = 'not find')
    {
        return $this->setCode(403)->responseNotFind($msg);
    }

    public function responseNotFind($msg)
    {
        $data = [
            'code' => $this->getCode(),
            'msg' => $msg,
            'data' => []
        ];
        return $this->response($data);
    }



}
