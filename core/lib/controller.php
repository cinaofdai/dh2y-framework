<?php
/**
 * 框架基控制器
 */

namespace core\lib;


class controller
{

    public $assign;

    public function __construct()
    {
        $this->assign['STATUS'] = config::get('TMPL_PARSE_STRING','config');
    }

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
    public function display($file = null){

        //获取控制器及动作创建视图
        $contrl = \core\dh2y::$controller;
        $file = $file?$file:\core\dh2y::$action;
        $module = \core\dh2y::$module;

        //是模块进入模块视图
        if($module){
            $view = APP.'/modules/'.$module.'/views/'.$contrl.'/'.$file.'.php';
            $modulView = APP.'/modules/'.$module.'/views/';
        }else{
            $view = APP.'/views/'.$contrl.'/'.$file.'.php';
            $modulView = APP.'/views/';
        }
        if(is_file($view)){

            $loader = new \Twig_Loader_Filesystem($modulView);
            $twig = new \Twig_Environment($loader, array(
                'cache' => config::get('CACHE','log'),
                'debug' => DEBUG,
            ));

            $template = $twig->load($contrl.'/'.$file.'.php');
            $template->display($this->assign?$this->assign:array());
        }else{
            throw new \Exception('找不到视图文件'.$file);
        }
    }
}