<?php
namespace core\lib\drive\log;
use config\Config;
class Log
{
	static $class;
	static public function init()
	{
		//确定储存方式
		$drive = Config::get('file','log');
		$class  = '\core\lib\\drive\\log\\'.$drive;
		self::$class = new $class;
	}
	
	static public function log($name,$flie = 'log')
	{
		self::$class->log($name,$flie);
	}
}