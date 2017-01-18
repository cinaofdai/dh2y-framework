<?php
/**
 * 数据模型类
 */

namespace core\lib;


class model extends \PDO
{
    public function __construct(){
        $dsn = 'mysql:host=localhost;dbname=dh2y';
        $username = 'root';
        $passwd = 'root';
        try{
            parent::__construct($dsn, $username, $passwd);
        }catch(\PDOException $e){
            p($e->getMessage());
        }

    }
}