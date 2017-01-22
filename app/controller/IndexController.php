<?php

namespace app\controller;

use app\model\AdminModel;
use core\lib\controller;
use core\util\Cookies;
use core\util\Session;
use core\util\String;


class IndexController extends controller
{
    public function index(){

        //p(cookie('dailin'));

        $obj = new Cookies();

        p($obj->get('cookietest'));

        $this->display();
    }

}