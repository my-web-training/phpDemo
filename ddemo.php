<?php
    //严格模式
    //declare(strict_types=1);
    use phpdemo\TypeDemo;
    use phpdemo\DBUtil;

    // 设置常量
    // 首个参数定义常量的名称
    // 第二个参数定义常量的值
    // 可选的第三个参数规定常量名是否对大小写敏感。默认是 false。
    define("App", "phpDemo");
    echo App;
    echo '<br>';

    define('TYPE_DEMO', realpath('phpdemo'));
    // require(TYPE_DEMO."TypeDemo.php");
    // include 'TypeDemo.php';
    require 'TypeDemo.php';

    printf(TypeDemo::helloWorld());

    echo '<br>';    
    $x=5;
    $y=10;

    //Global变量 函数内调研
    function myGlobalTest() {
        $GLOBALS['y']=$GLOBALS['x']+$GLOBALS['y'];
    } 

    myGlobalTest();
    echo $y; // 输出 15
    // 能够输出一个以上的字符串
    echo '<br>';    
    //print - 只能输出一个字符串，并始终返回 1

    //static变量 函数内不销毁
    function myStaticTest() {
        static $x=0;
        echo $x;
        echo '<br>';
        $x++;
    }

    myStaticTest();
    myStaticTest();
    myStaticTest();

    TypeDemo::showType();
    TypeDemo::math();
    TypeDemo::stringFun();
    TypeDemo::completFun();
    TypeDemo::conditionFun();
    TypeDemo::switchFun(1);
    TypeDemo::whileFun();
    TypeDemo::forforeachFun();
    TypeDemo::arrayApFun();
    TypeDemo::fileFun();

    require 'DBUtil.php';    
    DBUtil::showUser();
?>