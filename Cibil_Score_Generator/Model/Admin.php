<?php
final class Admin{
	private $admin_name="vishnu";
	private $admin_num="hello12345";
	public function setAdminName($admin_name)
	{
		$this->admin_name=$admin_name;
	}
	public function getAdminName(){
		return $this->admin_name;
	}
	public function setAdminnum($admin_num)
	{
		$this->admin_num=$admin_num;
	}
	public function getAdminnum(){
		return $this->admin_num;
	}
}


?>
