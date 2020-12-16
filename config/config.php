<?php
namespace config;
class Config
{
	static public $config = [];
	
	/**
	 * 加载单个配置项
	 * @param $name string 配置名
	 * @param $file string 配置文件
	 * @return $conf[$name] string 配置项
	 */
	static public function get($name,$file)
	{
		/**
		 * 1.判断配置文件是否存在
		 * 2.判断配置是否存在
		 * 3.缓存配置
		 */
		if(isset(self::$config[$file])){
			return self::$config[$file][$name];
		}else{
			$path = MVC.'\config\\'.$file.'.php';
			if(is_file($path)){
				$conf = include $path;	//加载配置文件，因为此配置文件返回的是一个数组，所以一但赋值给变量，这个变量则成为一个数组
				if(isset($conf[$name])){
					self::$config[$file] = $conf;
					return self::$config[$file][$name];
				}else{
					throw new \Exception('找不到配置项'.$name);
				}
			}else{
				throw new \Exception('找不到配置文件'.$file);
			}
		}
	}
	
	/**
	 * 加载一个文件中的所有配置项
	 * @param $file string 配置文件
	 * @return self::$config[$file] string 所有配置项
	 */
	static public function all($file)
	{
		$path = MVC.'\config\\'.$file.'.php';
		if(is_file($path)){
			$conf = include $path;
			return $conf;
		}else{
			throw new \Exception('找不到配置文件'.$file);
		}
	}
}