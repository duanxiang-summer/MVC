<?php
namespace core\lib;
use config\Config;
use Medoo\Medoo;
class Database extends Medoo
{
	public function __construct()
	{
		$option = Config::all('db');
		parent::__construct($option);
	}
}


