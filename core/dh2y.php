<?php
/**
 * dh2y框架入口文件
 */
namespace core;

class dh2y {

    public static $classMap = array();
    public static $controller;      //控制器
    public static $action;          //方法
    public static $modul;           //模块
    /**
     * 框架启动入口
     */
    static public function run(){
        //访问日志初始化
        \core\lib\log::init();

        //路由定义
        $rout = new \core\lib\route();
        self::$controller = $controller = $rout->controller;
        self::$action = $action = $rout->action;
        $ctrlFile = APP.'/controller/'.$controller.'Controller.php';
        $ctrlClass = '\\'.MODULE.'\controller\\'.$controller.'Controller';

        //如果存在模块
        if($rout->modul){
            self::$modul = $modul = $rout->modul;
            $ctrlFile = APP.'/moduls/'.$modul.'/controller/'.$controller.'Controller.php';
            $ctrlClass = '\\'.MODULE.'\moduls\\'.$modul.'\controller\\'.$controller.'Controller';

        }

        //查找控制器文件,包含进来实例化动作方法
        if(is_file($ctrlFile)){
            include $ctrlFile;
            $ctrl = new $ctrlClass();
            $ctrl->$action();

            $modul = self::$modul?$modul:'';
            \core\lib\log::log('modul:'.$modul.' controller:'.$controller.' action:'.$action);
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