<?php
namespace app\controller;
use app\model\IndexModel;
use config\Config;
class IndexController extends Controller
{	
	public $model = null;
	public function __construct()
	{
		$this->model = new IndexModel();
	}
	
	public function index()
	{
		$title = '你好,世界';
		$this->assign('title',$title);
		$this->fetch('index\index');
	}
}