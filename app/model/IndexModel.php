<?php
namespace app\model;
class IndexModel extends CommonModel
{
	protected $table = 'bert_user';
	
	public function info($columns = '*',$where = [])
	{
		$select = $this->select($this->table,$columns,$where);
		return $select;
	}
	
	public function add($data = [])
	{
		$insert = $this->insert($this->table,$data);
		return $insert;
	}
	
	public function edit($data = [],$where = [])
	{
		$update = $this->update($this->table,$data,$where);
		return $update;
	}
	
	public function destroy($where = [])
	{
		$delete = $this->delete($this->table,$where);
		return $delete;
	}
}