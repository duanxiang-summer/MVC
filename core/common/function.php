<?php

/**
 * 打印信息
 * @param int or string or array $val
 * @return int or string or array $val
 */
function v($val)
{
	if(is_bool($val)){
		echo "<pre>";
		var_dump($val);
		echo "</pre>";
	}else if(is_null($val)){
		echo "NULL";
	}else{
		echo "<pre>";
		print_r($val);
		echo "</pre>";
	}
	
}