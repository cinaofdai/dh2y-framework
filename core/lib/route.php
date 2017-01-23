<?php
/**
 * 路由加载类
 */
namespace core\lib;

use core\lib\config;

class route
{

    public $controller;
    public $action;
    public $module;

    /**
     * 路由初解析
     * route constructor.
     */
    public function __construct(){
        if(isset($_SERVER['REDIRECT_URL'])&&$_SERVER['REDIRECT_URL']!='/'){
            $path = $_SERVER['REDIRECT_URL'];
            $pathUrl = explode('/',trim($path,'/'));

            //如果是基数进入modules
            $m = 0;
            if(count($pathUrl)%2 == 1){
                $m = 1;
                $this->module = $pathUrl[0];
            }

            if(isset($pathUrl[0+$m])){
                $this->controller = $pathUrl[0+$m];
                unset($pathUrl[0+$m]);
            }else{
                $this->controller = config::get('CONTROLLER','route');
            }

            if(isset($pathUrl[1+$m])){
                $this->action = $pathUrl[1+$m];
                unset($pathUrl[1+$m]);
            }else{
                $this->action = config::get('ACTION','route');
            }

            //url多余部分转化 GET
            $count = count($pathUrl);
            $i = 2+$m;
            while($i < $count){
                if(isset($pathUrl[$i+1])){
                    $_GET[$pathUrl[$i]] = $pathUrl[$i+1];
                }
                $i = $i + 2;
            }
        }else{
            $this->controller = config::get('CONTROLLER','route');
            $this->action = config::get('ACTION','route');
        }
    }
}