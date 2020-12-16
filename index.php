<?php

define('MVC', __DIR__);	//框架当前目录

define('CORE',MVC.'/core');	//框架核心目录

define('APP',MVC.'/app');		//应用核心目录

define('CTRL','app\\');		//定义控制器根命名空间

define('DEBUG',true);	//开启调试

include "vendor/autoload.php";

if(DEBUG){
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
	ini_set('display_error','On');	//开启显示错误
}else{
	ini_set('display_error','Off');	//关闭显示错误
}
include CORE.'/common/function.php';	//加载函数库

include CORE.'/Mvc.php';		//加载框架核心文件（基础类）

spl_autoload_register('\core\Mvc::load');

core\Mvc::run();		//启动框架