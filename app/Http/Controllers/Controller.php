<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private static $code = '';
    private static $msg = '';

    private function setCode($code)
    {
        self::$code = $code;
    }

    private function setMsg($msg)
    {
        self::$msg = $msg;
    }

    private function setContent($code, $msg)
    {
        $this->setCode($code);
        $this->setMsg($msg);
    }

    private function getCode()
    {
        return self::$code;
    }

    private function getMsg()
    {
        return self::$msg;
    }

    protected function respond($info, $code, $msg)
    {
        $this->setContent($code, $msg);
        return response()->json([
            'info' => $info,
            'code' => $this->getCode(),
            'mag' =>  $this->getMsg(),
        ]);
    }
}
