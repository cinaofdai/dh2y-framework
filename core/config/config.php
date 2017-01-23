<?php

$path = APP.'/config/config.php';

$dh2yConfig = array(
    'tablePrefix' => '',            //表前缀

    /* Cookie设置 */
    'COOKIE_EXPIRE'         =>  3600,       // Cookie有效期
    'COOKIE_DOMAIN'         =>  '',      // Cookie有效域名
    'COOKIE_PATH'           =>  '/',     // Cookie路径
    'COOKIE_PREFIX'         =>  '',      // Cookie前缀 避免冲突
    'COOKIE_SECURE'         =>  false,   // Cookie安全传输
    'COOKIE_HTTPONLY'       =>  '',      // Cookie httponly设置
    'COOKIE_SECUREKEY'     =>  'ekOt4_Ut0f3XE-fJcpBvRFrg506jpcuJeixezgPNyALm', //encrypt秘钥

    /* SESSION设置 */
    'SESSION_NAME'           => 'dh2y',        //初始化SESSION_NAME
    'SESSION_PATH'           => '',           //Session保存路径
    'SESSION_CALLBACK'       => '',           //设置Session 对象反序列化时候的回调函数 回调函数方法名
    'SESSION_EXPIRE'         =>  3600,       // session有效期

    //上传文件配置
    'FILE_UPLOAD_TYPE'      =>  'Local',    // 文件上传方式

);

if(is_file($path)){
    $config = include $path;
    return array_merge($dh2yConfig,$config);
}else{
    return $dh2yConfig;
}

