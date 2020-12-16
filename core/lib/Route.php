<?php
namespace core\lib;
use config\Config;
class Route
{
	public $plate;
	public $controller;
	public $action;
	
	public function __construct()
	{
		if($_SERVER['REQUEST_URI'] && $_SERVER['REQUEST_URI'] != '/')
		{
			$path = $_SERVER['REQUEST_URI'];
			
			$pathArr = explode('/',trim($path,'/'));
			
			if(isset($pathArr[0]))
			{
				$this->plate = [0];
				unset($pathArr[0]);
			}
			
			if(isset($pathArr[1]))
			{
				$this->controller = $pathArr[1];
				unset($pathArr[1]);
			}
			
			if(isset($pathArr[2]))
			{
				$this->action = $pathArr[2];
				unset($pathArr[2]);
			}
			
			if($pathArr)
			{
				$count = count($pathArr)+3;
				
				$i = 3;
				while ($i < $count)
				{
					if(isset($pathArr[$i+1]))
					{
						$_GET[$pathArr[$i]] = $pathArr[$i+1];
					}
					$i = $i+2;
				}
			}
		}else{
			$this->plate = Config::get('plate','route');
			$this->controller = Config::get('controller','route');
			$this->action = Config::get('action','route');
		}
	}
}