<?php
/**
 * dh2y框架入口文件
 */
namespace core;

class dh2y {

    public static $classMap = array();

    /**
     * 框架启动入口
     */
    static public function run(){
        //访问日志初始化
        \core\lib\log::init();

        //路由定义
        $rout = new \core\lib\route();
        $controller = $rout->controller;
        $action = $rout->action;
        $ctrlFile = APP.'/controller/'.$controller.'Controller.php';
        $ctrlClass = '\\'.MODULE.'\controller\\'.$controller.'Controller';

        //查找控制器文件,包含进来实例化动作方法
        if(is_file($ctrlFile)){
            include $ctrlFile;
            $ctrl = new $ctrlClass();
            $ctrl->$action();
            \core\lib\log::log('controller:'.$controller.' action:'.$action);
        }else{
            throw new \Exception('找不到控制器'.$controller);
        }
    }

    /**
     * 自动加载类库
     */
    static public function load($class){
        if(isset($classMap[$class])){
            return true;
        }else{
            $class = str_replace('\\', '/', $class);
            $file = DH2Y.'/'.$class.'.php';
            if(is_file($file)){
                include $file;
                self::$classMap[$class] = $class;
            }else{
                return false;
            }
        }
    }
}