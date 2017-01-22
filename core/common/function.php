<?php

/**
 * --------------------------
 * 输出对应的变量或者数组
 * --------------------------
 */
function p($var){
    if(is_bool($var)){
        var_dump($var);
    }elseif (is_null($var)) {
        var_dump(NULL);
    }else{
        echo '<pre style="position:relative;z-index:1000;padding:10px;border-radius:5px;background:#f5f5f5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;">'.print_r($var,true).'</pre>';
    }
}

/**
 * @param $name 接收值
 * @param bool $default 默认值
 * @param bool $fitter 过滤方法  int
 * @return bool|int|string
 */
function post($name,$default = false,$fitter = false){
    if(isset($_POST[$name])){
        if($fitter){
            switch($fitter){
                case 'int':
                    if(is_numeric($_POST[$name])){
                        return $_POST[$name];
                    }else{
                        return is_numeric($default)?$default:0;
                    }
                break;
                default ;
            }
        }else{
            return $_POST[$name];
        }
    }else{
        return $default;
    }
}

/**
 * @param $name 接收值
 * @param bool $default 默认值
 * @param bool $fitter 过滤方法  int
 * @return bool|int|string
 */
function get($name,$default = false,$fitter = false){
    if(isset($_GET[$name])){
        if($fitter){
            switch($fitter){
                case 'int':
                    if(is_numeric($_GET[$name])){
                        return $_GET[$name];
                    }else{
                        return is_numeric($default)?$default:0;
                    }
                    break;
                default ;
            }
        }else{
            return $_GET[$name];
        }
    }else{
        return $default;
    }
}