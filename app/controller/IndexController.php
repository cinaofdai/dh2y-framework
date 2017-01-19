<?php

namespace app\controller;

use core\lib\controller;
use core\lib\config;
class IndexController extends controller
{
    public function index(){

       new \core\lib\model();
        $data = 'this is view';
        $ok = 'ok 的';
        $this->assign('data',$data);
        $this->assign('ok',$ok);
        $this->display('index.html');
    }

}