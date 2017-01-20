<?php
/**
 * 入口文件
 */
define('DH2Y',__DIR__);
define('CORE',DH2Y.'/core');
define('APP',DH2Y.'/app');
define('MODULE','app');
define('DEBUG',true);

include 'vendor/autoload.php';
if(DEBUG){
    $whoops = new \Whoops\Run();
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
    $whoops->register();
    ini_set('display_errors','On');
}else{
    ini_set('display_errors','Off');
}


include CORE.'/common/function.php';

include CORE.'/dh2y.php';

spl_autoload_register('\core\dh2y::load');

\core\dh2y::run();