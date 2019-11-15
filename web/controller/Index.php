<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/11/13
 * Time: 18:37
 */

namespace web\controller;


use core\View;
use Gregwar\Captcha\CaptchaBuilder;
use http\Header;

class Index
{
    protected $view;
    public function __construct()
    {
        $this->view = new View();
    }

    public  function index () {
        phpinfo();
    }

    public  function show () {
        return $this->view->make('index')->with('version','版本：1.23');
    }

    public  function login () {
        //  dd($_SESSION);
        return $this->view->make('login');
    }

    public  function code () {
        $builder = new CaptchaBuilder;
        $builder->build(100,20);
        header('Content-type: image/jpeg');
        $builder->output();
        $_SESSION['phrase'] = $builder->getPhrase();
        //$builder->save('out.jpg');
    }
    public function post () {
        if (isset($_POST['captcha'])){
            if(strtolower($_POST['captcha'])  === strtolower($_SESSION['phrase'])) {
                // instructions if user phrase is good
                echo '提交成功！';
            }
            else {
                // user phrase is wrong
                echo '验证码错误！';
                /*sleep(3);
                header('location: ?s=index/login');*/
            }
        }
    }
}