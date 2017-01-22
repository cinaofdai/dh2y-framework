<?php

namespace app\moduls\shop\controller;


use core\lib\controller;

class IndexController extends controller
{
    public function index()
    {
        $data = '这是购物模块';
        $this->assign('data', $data);
        $this->display();

    }

}