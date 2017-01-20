<?php

namespace core\lib\drive\log;
/**
 * 数据库系统日志
 */
use core\lib\config;
class mysql{

    public $path;       //  日志存储位置

    public function __construct(){
        $conf = config::get('OPTION','log');

    }

    /**
     * 1. 确定存储位置是否存在
     *    创建
     * 2. 写入日志
     */
    public function log($message,$file = 'log'){

    }
}
