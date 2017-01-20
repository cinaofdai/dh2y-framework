<?php
/**
 * 数据模型基类
 */

namespace core\lib;

use core\lib\config;

class model extends \medoo
{
    public $table;

    public function __construct(){

        $database = config::all('database');
        parent::__construct($database);

        //获取继承的类名，获取表名称
        $class = get_called_class();
        $tablePrefix = \core\lib\config::get('tablePrefix','config');
        $this->table = $tablePrefix.$class::tableName();
    }

    //查询所有数据
    public function findAll($columns = null,$where = null){
        $columns = $columns==null?'*':$columns;

        if($where==null){
            $result = $this->select($this->table,$columns);
        }else{
            $result = $this->select($this->table,$columns,$where);
        }
        return $result;
    }


    //查询一条语句
    public function findOne($id){
        $result = $this->get($this->table,'*',array(
            'id'=>$id
        ));
        return $result;
    }

    //更新一条数据
    public function setOne($id,$data){
        return $this->update($this->table,$data,array(
            'id' => $id
        ));
    }

    //删除一条数据
    public function delOne($id){
        return $this->delete($this->table,array(
           'id' => $id
        ));
    }

    //返回最后一条查询语句
    public function getLastSql(){
        return $this->last_query();
    }

    //得到本查询的错误日志
    public function getError(){
        return $this->error();
    }
}