<?php

namespace app\controller;

use app\model\AdminModel;
use core\lib\controller;
use core\util\String;


class IndexController extends controller
{
    public function index(){

      $model = new AdminModel();
        $data = $model->findAll();

        $str = String::uuid();
        $data = 'this is view' . $str;
        $ok = 'ok 的';
        $this->assign('data',$data);
        $this->assign('ok',$ok);
        $this->display();
    }

}