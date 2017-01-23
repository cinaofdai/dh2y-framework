<?php
/**
 * 路由指向类
 */

namespace core\util\dh2y;


class Url
{

    /**
     * 模仿yii路由类
     * @param string $url
     * @param bool $scheme
     * @return mixed|string
     */
    public static function to($url = '', $scheme = false)
    {
        if (is_array($url)) {
            return static::toRoute($url, $scheme);
        }

        if (!$scheme) {
            return $url;
        }

        return self::home().'/'.$url;
    }

    /**
     * 模仿yii2路由帮助类
     * @param $route
     * @param bool $scheme
     * @return mixed
     */
    public static function toRoute($route, $scheme = false)
    {
        $route = (array) $route;
        $url   =  $route[0];
        unset($route[0]);

        if(\core\dh2y::$modul){
            $modul = \core\dh2y::$modul.'/';
        }else{
            $modul = '';
        }

        $params = http_build_query($route)?'?'.http_build_query($route):'';
        if ($scheme) {
            return static::Home().'/'.$modul.$url.$params;
        } else {
            return '/'.$modul.$url.$params;
        }
    }

    /**
     * 等到路由主页
     */
    public static function home(){
       return 'http://'.$_SERVER['HTTP_HOST'];
    }

}