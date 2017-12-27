<?php 

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');


class Admin
{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db= new Database();
		$this->fm= new Format();
	}

	public function getAdminData($data){
		$adminuser = $this->fm->validation($data['adminuser']);
		$adminpass = $this->fm->validation($data['adminpass']);

		$adminuser= mysqli_real_escape_string($this->db->link, $adminuser);
		$adminpassr= mysqli_real_escape_string($this->db->link, $adminpass);

		$query = "SELECT * FROM admin WHERE adminuser='$adminuser' AND adminpass='$adminpass'";
		$result = $this->db->select($query);
		if ($result != false) {
			$value = $result->fetch_assoc();
			Session::init();
			Session::set("adminLogin", true);
			Session::set("adminuser", $value['adminuser']);
			Session::set("adminuid", $value['adminid']);
			header("Location:index.php");
		}else{
			$msg = "<span class='error'>Username or passwors not match</span>";
		}
	}
}

?>