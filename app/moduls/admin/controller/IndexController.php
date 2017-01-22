<?php

namespace app\moduls\admin\controller;


use app\model\AdminModel;
use core\lib\controller;

class IndexController extends controller
{
    public function index()
    {
        $data = '这是后台模块';
        $this->assign('data', $data);
        $this->display();

    }

}