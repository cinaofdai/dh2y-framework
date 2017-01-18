<?php

namespace app\controller;

use core\lib\controller;

class IndexController extends controller
{
    public function index(){
        $data = 'this is view';
        $ok = 'ok 的';
        $this->assign('data',$data);
        $this->assign('ok',$ok);
        $this->display('index.html');
    }

}