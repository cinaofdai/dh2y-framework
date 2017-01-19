<?php
/**
 * 数据模型类
 */

namespace core\lib;

use core\lib\config;

class model extends \PDO
{
    public function __construct(){
        $database = config::all('database');
        try{
            parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWORD']);
        }catch(\PDOException $e){
            p($e->getMessage());
        }

    }
}