<?php

namespace app\moduls\admin\controller;


use app\model\AdminModel;
use core\lib\controller;
use core\util\Url;

class IndexController extends controller
{
    public function index()
    {

        p(Url::home());die;
        $rout =  Url::toRoute(['index/index','id'=>1,'name'=>'daitest'],true);

        $this->assign('rout',$rout);

        $data = '这是后台模块';
        $this->assign('data', $data);
        $this->display();

    }

}