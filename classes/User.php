<?php 

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');


class User
{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db= new Database();
		$this->fm= new Format();
	}

	public function userRegistration($name, $username, $password, $email){

		$name= $this->fm->validation($name);
		$username= $this->fm->validation($username);
		$password= $this->fm->validation($password);
		$email= $this->fm->validation($email);

		$name= mysqli_real_escape_string($this->db->link, $name);
		$username= mysqli_real_escape_string($this->db->link, $username);
		$password= mysqli_real_escape_string($this->db->link, $password);
		$email= mysqli_real_escape_string($this->db->link, $email);

		if($name =="" || $username=="" || $password=="" || $email=="") 
		{
			echo "<span class='error'>Fields Must Not Be Empty!</span>";
			exit();
		}else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			echo "<span class='error'>Invalid Email</span>";
			exit();
		}else{
			$chkquery = "SELECT * FROM user WHERE email='$email'";
			$chkresult = $this->db->select($chkquery);
			if ($chkresult != false) {
				echo "<span class='error'>Email Already Exist</span>";
				exit();
			}else{
				$query = "INSERT INTO user(name, username, password, email) VALUES('$name', '$username', '$password', '$email')";
				$insered_row = $this->db->insert($query);
				if ($insered_row) {
					echo "<span class='success'>Registration Successful</span>";
					exit();
				}else{
					echo "<span class='error'>Error... not registrated</span>";
					exit();
				}

			}
		}
	}

	public function userLogin($email, $password){
		$email = $this->fm->validation($email);
		$password = $this->fm->validation($password);
		$email= mysqli_real_escape_string($this->db->link, $email);
		$password= mysqli_real_escape_string($this->db->link, $password);

		if ($email == "" || $password=="") 
		{
			echo "empty";
			exit();
		}else{
			$query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				if ($value['status']=='1') {
					echo "disable";
					exit();
				}else{
					Session::init();
					Session::set("userLogin", true);
					Session::set("name", $value['name']);
					Session::set("user", $value['username']);
					Session::set("userid", $value['userid']);
					header("Location:index.php");
				}
			}else{
				echo "Error";
				exit();
			}
		}
	}

	public function getUserData($userid)
	{
		$query = "SELECT * FROM user WHERE userid='$userid'";
		$result = $this->db->select($query);
		return $result;
	}

	public function updateUserData($userid, $data){
		$name= $this->fm->validation($data['name']);
		$username= $this->fm->validation($data['username']);
		$email= $this->fm->validation($data['email']);

		$name= mysqli_real_escape_string($this->db->link, $name);
		$username= mysqli_real_escape_string($this->db->link, $username);
		$email= mysqli_real_escape_string($this->db->link, $email);

		$query = "UPDATE user 
		SET 
		name ='$name',
		username= '$username' ,
		email= '$email'
		WHERE userid = '$userid'";

		$updated_row = $this->db->update($query);
		if ($updated_row) {
			$msg = "<span class='success'> User data updated!</span>";
			return $msg;
		} else{
			$msg = "<span class='error'> User not data updated..!!</span>";
			return $msg;
		}


	}

	/*public function getAdminData($data){
		$adminuser = $this->fm->validation($data['adminuser']);
		$adminpass = $this->fm->validation($data['adminpass']);

		$adminuser= mysqli_real_escape_string($this->db->link, $adminuser);
		$adminpassr= mysqli_real_escape_string($this->db->link, $adminpass);

		$query = "SELECT * FROM admin WHERE adminuser='$adminuser' AND adminpass='$adminpass'";
		
	}*/

	public function getAllUser(){
		$query = "SELECT * FROM user";
		$result = $this->db->select($query);
		return $result;
	}

	public function DisableUser($UserId){
		$query = "UPDATE user SET status ='1' WHERE userid = '$UserId'";
		$updated_row = $this->db->update($query);
		if ($updated_row) {
			$msg = "<span class='success'> User Disabled..!</span>";
			return $msg;
		} else{
			$msg = "<span class='error'> User not Disabled...!!</span>";
			return $msg;
		}
	}

	public function enableUser($UserId){
		$query = "UPDATE user SET status ='0' WHERE userid = '$UserId'";
		$updated_row = $this->db->update($query);
		if ($updated_row) {
			$msg = "<span class='success'> User Enabled..!</span>";
			return $msg;
		} else{
			$msg = "<span class='error'> User not Enabled...!!</span>";
			return $msg;
		}
	}

	public function deleteUser($UserId){
		$query = "DELETE FROM user WHERE userid = '$UserId'";
		$updated_row = $this->db->DELETE($query);
		if ($updated_row) {
			$msg = "<span class='success'> User Removed..!</span>";
			return $msg;
		} else{
			$msg = "<span class='error'> User not Removed...!!</span>";
			return $msg;
		}
	}
}

?>