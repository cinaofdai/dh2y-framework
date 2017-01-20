<?php

$path = APP.'/config/config.php';

$dh2yConfig = array(
    'tablePrefix' => '',            //表前缀
);

if(is_file($path)){
    $config = include $path;
    return array_merge($dh2yConfig,$config);
}else{
    return $dh2yConfig;
}

