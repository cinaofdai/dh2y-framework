<?php

namespace app\controller;

use app\model\AdminModel;
use core\lib\controller;
use core\util\Cookies;
use core\util\Session;
use core\util\String;
use core\util\Url;


class IndexController extends controller
{
    public function index(){

        p(get('id'));
        p(get('name'));
        $rout =  Url::toRoute(['index/index','id'=>1,'name'=>'daitest']);

        $this->assign('rout',$rout);
        $this->display();
    }

}