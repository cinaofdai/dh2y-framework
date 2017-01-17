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
        p('ok');
        $rout = new \core\route();
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