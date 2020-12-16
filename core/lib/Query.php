<?php
namespace core\lib;
use core\lib\Database;
class Query
{
	protected $db = null;
	public function __construct()
	{
		$this->db = new Database();
	}
	
	/**
	 * 查询
	 * @param $table string 数据表名
	 * @param $columns string/array 字段名
	 * @param $where array 查询条件
	 * @return $result 结果集
	 */
	public function select($table = '',$columns = '*',$where = [])
	{
		$this->is_table($table);
		$result = $this->db->select($table,$columns,$where);
		return $result;
	}
	
	/**
	 * 新增
	 * @param $table string 数据表名
	 * @param $data array 需要新增的数组
	 * @return $result bool
	 */
	public function insert($table = '', $data = [])
	{
		$this->is_table($table);
		$result = $this->db->insert($table,$data);
		return $result;
	}
	
	/**
	 * 更新
	 * @param $table string 数据表名
	 * @param $data array 需要更新的数组
	 * @param $where string/array 更新条件
	 * @return $result bool
	 */
	public function update($table = '', $data = [], $where = [])
	{	
		$this->is_table($table);
		$this->is_where($where);
		$result = $this->db->update($table, $data, $where);
		return $result;
	}
	
	/**
	 * 删除
	 * @param $table string 数据表名
	 * @param $where string/array 删除条件
	 * @return $result bool
	 */
	public function delete($table = '', $where = [])
	{
		$this->is_table($table);
		$result = $this->db->delete($table, $where);
		return $result;
	}
	
	/**
	 * 检测数据表是否为空
	 * @param $table string 数据表名
	 */
	private function is_table($table)
	{
		if(empty($table))
		{
			die('数据表不可为空！');
		}
	}
	
	/**
	 * 检测操作条件是否为空
	 * @param $where string 条件
	 */
	private function is_where($where)
	{
		if(empty($where))
		{
			die('缺少更新条件！');
		}
	}
	
}