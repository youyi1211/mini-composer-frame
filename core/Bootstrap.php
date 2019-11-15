<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/11/13
 * Time: 17:48
 */

namespace core;


class Bootstrap
{
    public static function run (){
        session_start();
        self::parseUrl();
    }


    public static function parseUrl () {
        if (isset($_GET['s'])){
            //分析s 变量 生成控制器方法
            $info = explode('/' , $_GET['s']);
            $class = '\web\controller\\'. ucfirst($info[0]) ;
            $action = $info[1];
        } else {
            $class = '\web\controller\Index';
            $action = 'show';
        }
        echo (new $class) ->$action();//先实例化对象，在指向方法，对版本有要求，输出控制器执行的结果
    }

}