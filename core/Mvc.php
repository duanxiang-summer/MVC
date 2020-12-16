<?php
namespace core;
class Mvc
{
	static public $classMap = [];
	public $assign = [];
	static public function run()
	{
		\core\lib\drive\log\log::init();
		$route = new lib\Route();
		$controller = $route->controller;
		$action = $route->action;
		$ctrlfile = APP.'\controller\\'.$controller.'.php';
		$ctrl = CTRL.'controller\\'.$controller;
		if(is_file($ctrlfile)){
			include $ctrlfile;
			$ctrlnew = new $ctrl();
			$ctrlnew->$action();
			\core\lib\drive\log\log::log('controlle: '.$controller.'    action: '.$action,'bert');
		}else{
			throw new \Exception('找不到控制器'.$controller);
		}
	}
	
	/**
	 * 自动加载类库
	 * @param $class string 类
	 */
	static public function load($class)
	{
		if($classMap[$class]){
			return true;
		}else{
			$class = str_replace('\\','/',$class);
			$is_file = MVC.'/'.$class.'.php';
			if(is_file($is_file)){
				include $is_file;
				self::$classMap[$class] = $class;
			}else{
				return false;
			}
		}
	}
	
	/**
	 * 模板渲染
	 * @param $name string 渲染名
	 * @param $value 渲染值
	 */
	public function assign($name,$value)
	{
		$this->assign[$name] = $value;
	}
	
	/**
	 * 加载模板
	 * @param $file string 文件名
	 */
	public function fetch($file)
	{
		$path = APP.'\\view\\'.$file.'.html';
		if(is_file($path))
		{
			\Twig_Autoloader::register();
			$loader = new \Twig_Loader_Filesystem(APP.'/view');	//视图路径
			$twig = new \Twig_Environment($loader, array(
			    'cache' => MVC.'/log/twig',
				'debug' => DEBUG
			));
			$template = $twig->loadTemplate($file.'.html');	//文件路径
			$template->display($this->assign?$this->assign:"");
		}
	}
}