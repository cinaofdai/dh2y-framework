<?php


/**
 * php<5.4
 * array_column函数定义
 */
if (!function_exists('array_column')) {
    function array_column($arr, $col, $key = '') {
        if (!$arr) return false;
        $res = array();
        foreach ($arr as $val) {
            if ($key) $res[$val[$key]] = $val[$col];
            else $res[] = $val[$col];
        }
        return $res;
    }
}


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
 * URL重定向
 * @param string $url 重定向的URL地址
 * @param integer $time 重定向的等待时间（秒）
 * @param string $msg 重定向前的提示信息
 * @return void
 */
function redirect($url, $time=0, $msg='') {
    //多行URL地址支持
    $url        = str_replace(array("\n", "\r"), '', $url);
    if (empty($msg))
        $msg    = "系统将在{$time}秒之后自动跳转到{$url}！";
    if (!headers_sent()) {
        // redirect
        if (0 === $time) {
            header('Location: ' . $url);
        } else {
            header("refresh:{$time};url={$url}");
            echo($msg);
        }
        exit();
    } else {
        $str    = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
        if ($time != 0)
            $str .= $msg;
        exit($str);
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



/**
 * Cookie 设置、获取、删除
 * @param string $name cookie名称
 * @param mixed $value cookie值
 * @param mixed $option cookie参数
 * @return mixed
 */
function cookie($name='', $value='', $option=null) {
    // 默认设置
    $config = array(
        'prefix'    =>  \core\lib\config::get('COOKIE_PREFIX','config'), // cookie 名称前缀
        'expire'    =>  \core\lib\config::get('COOKIE_EXPIRE','config'), // cookie 保存时间
        'path'      =>  \core\lib\config::get('COOKIE_PATH','config'), // cookie 保存路径
        'domain'    =>  \core\lib\config::get('COOKIE_DOMAIN','config'), // cookie 有效域名
        'secure'    =>  \core\lib\config::get('COOKIE_SECURE','config'), //  cookie 启用安全传输
        'httponly'  =>  \core\lib\config::get('COOKIE_HTTPONLY','config'), // httponly设置
    );
    // 参数设置(会覆盖黙认设置)
    if (!is_null($option)) {
        if (is_numeric($option))
            $option = array('expire' => $option);
        elseif (is_string($option))
            parse_str($option, $option);
        $config     = array_merge($config, array_change_key_case($option));
    }
    if(!empty($config['httponly'])){
        ini_set("session.cookie_httponly", 1);
    }
    // 清除指定前缀的所有cookie
    if (is_null($name)) {
        if (empty($_COOKIE))
            return null;
        // 要删除的cookie前缀，不指定则删除config设置的指定前缀
        $prefix = empty($value) ? $config['prefix'] : $value;
        if (!empty($prefix)) {// 如果前缀为空字符串将不作处理直接返回
            foreach ($_COOKIE as $key => $val) {
                if (0 === stripos($key, $prefix)) {
                    setcookie($key, '', time() - 3600, $config['path'], $config['domain'],$config['secure'],$config['httponly']);
                    unset($_COOKIE[$key]);
                }
            }
        }
        return null;
    }elseif('' === $name){
        // 获取全部的cookie
        return $_COOKIE;
    }
    $name = $config['prefix'] . str_replace('.', '_', $name);
    if ('' === $value) {
        if(isset($_COOKIE[$name])){
            $value =    $_COOKIE[$name];
            if(0===strpos($value,'think:')){
                $value  =   substr($value,6);
                return array_map('urldecode',json_decode($value,true));
            }else{
                return $value;
            }
        }else{
            return null;
        }
    } else {
        if (is_null($value)) {
            setcookie($name, '', time() - 3600, $config['path'], $config['domain'],$config['secure'],$config['httponly']);
            unset($_COOKIE[$name]); // 删除指定cookie
        } else {
            // 设置cookie
            if(is_array($value)){
                $value  = 'think:'.json_encode(array_map('urlencode',$value));
            }
            $expire = !empty($config['expire']) ? time() + intval($config['expire']) : 0;
            setcookie($name, $value, $expire, $config['path'], $config['domain'],$config['secure'],$config['httponly']);
            $_COOKIE[$name] = $value;
        }
    }
    return null;
}