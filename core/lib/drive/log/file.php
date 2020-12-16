<?php
namespace core\lib\drive\log;
use config\Config;
class File
{
	public $path;
	public function __construct()
	{
		$conf = Config::get('option','log');
		$this->path = $conf['path'];
	}
	public function log($msg,$file = 'log')
	{
		if(!is_dir($this->path))
		{
			mkdir($this->path,'0777',true);
		}
		$src = $this->path.date('YmdH');
		if(!is_dir($src))
		{
			mkdir($src);
		}
		$msg = date('Y-m-d H:i:s',time()).json_encode($msg,JSON_UNESCAPED_UNICODE);
		return file_put_contents($src.'\\'.$file.'.php',$msg.PHP_EOL,FILE_APPEND);
	}
}