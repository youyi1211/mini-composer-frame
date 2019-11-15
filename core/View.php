<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/11/14
 * Time: 11:28
 */

namespace core;
set_include_path($_SERVER['DOCUMENT_ROOT'].'demo/web/');

class View
{
    //模板文件
    protected $file ;
    //模板变量
    protected $vars = [];// > php5.4


    public function make ($file) {
        $this->file = 'view/'.$file.'.html';
        return $this;
    }
    //分配变量
    public function with ($name,$val) {
        $this->vars[$name] = $val;
        return $this;
    }
    public function __toString()
    {
        // 加载模板
        extract($this->vars);
        include $this->file;
        return '';
    }

}