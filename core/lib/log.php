<?php
/**
 * 日志记录类
 */

namespace core\lib;

use core\lib\config;
class log
{
    static $class;
    /**
     * 1.日志存储方式
     * 2.写日志
     */

    static public function init(){
        $drive = config::get('DRIVE','log');
        $class ='\core\lib\drive\log\\'.$drive;
        self::$class = new $class;
    }

    static public function log($name){
        self::$class->log($name);
    }
}