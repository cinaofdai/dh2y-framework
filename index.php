<?php
/**
 * 入口文件
 */
define('DH2Y',__DIR__);
define('CORE',DH2Y.'/core');
define('APP',DH2Y.'app');

define('DEBUG',true);

if(DEBUG){
    ini_set('display_error','On');
}else{
    ini_set('display_error','Off');
}

include CORE.'/common/function.php';

include CORE.'/dh2y.php';

spl_autoload_register('\core\dh2y::load');

\core\dh2y::run();