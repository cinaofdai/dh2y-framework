<?php
/**
 * 框架基控制器
 */

namespace core\lib;


class controller
{

    public $assign;

    /**
     * 传递数据到视图
     * @param $name
     * @param $value
     */
    public function assign($name,$value){
        $this->assign[$name] = $value;
    }

    /**
     * 显示视图
     * @param $file
     * @throws \Exception
     */
    public function display($file){
        $view = APP.'/views/'.$file;
        if(is_file($view)){
            extract($this->assign);
            include $view;
        }else{
            throw new \Exception('找不到视图文件'.$file);
        }
    }
}