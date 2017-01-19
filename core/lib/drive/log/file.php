<?php
namespace core\lib\drive\log;
use core\lib\config;

/**
 * 文件系统日志
 */
class file{

    public $path;       //  日志存储位置

    public function __construct(){
        $conf = config::get('OPTION','log');
        $this->path = $conf['PATH'];
    }

    /**
     * 1. 确定存储位置是否存在
     *    创建
     * 2. 写入日志
     */
    public function log($message,$file = 'log'){
       if( !is_dir($this->path)){
           mkdir($this->path,'0777',true);
       }
        $message = date('Y-m-d H:i:s') . $message;
        return file_put_contents($this->path.$file.'.php',json_encode($message));
    }
}
