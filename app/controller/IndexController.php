<?php

namespace app\controller;

use app\model\AdminModel;
use core\lib\controller;


class IndexController extends controller
{
    public function index(){

      $model = new AdminModel();
        $data = $model->findAll();

        p($data);
        $data = 'this is view';
        $ok = 'ok 的';
        $this->assign('data',$data);
        $this->assign('ok',$ok);
        $this->display();
    }

}