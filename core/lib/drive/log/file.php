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
       if( !is_dir($this->path.date('Ymd'))){
           mkdir($this->path.date('Ymd'),'0777',true);
       }
        $logfile = $this->path.date('Ymd').'/'.date('YmdH').$file.'.php';
        return file_put_contents($logfile,date('Y-m-d H:i:s').json_encode($message).PHP_EOL,FILE_APPEND);
    }
}
