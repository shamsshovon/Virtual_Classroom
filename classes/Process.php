<?php 

	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');

	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');


class Process
{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db= new Database();
		$this->fm= new Format();
	}

	public function processData($data){
		$selectedAns = $this->fm->validation($data['ans']);
		$number = $this->fm->validation($data['number']);

		$selectedAns = mysqli_real_escape_string($this->db->link, $selectedAns);
		$number = mysqli_real_escape_string($this->db->link, $number);
		$next = $number+1;

		if (!isset($_SESSION['score'])) {
			$_SESSION['score']='0';
		}

		$total = $this->getTotal();
		$right = $this->rightAns($number);
		if ($right==$selectedAns) {
			$_SESSION['score']++;
		}
		if ($number==$total) {
			header("Location: final.php");
			exit();
		}else{
			header("Location:test.php?q=".$next);

		}
	}

	private function getTotal(){
		$query = "SELECT * FROM question";
		$getResult = $this->db->select($query);
		$total = $getResult->num_rows;
		return $total;
	}

	private function rightAns($number){
		$query = "SELECT * FROM answer WHERE q_no='$number' AND right_ans= '1'" ;
		$getdata = $this->db->select($query)->fetch_assoc();
		$result = $getdata['A_id'];
		return $result;
	}

	public function getDesData(){

		$query = "SELECT * FROM discussion";
		$getdata = $this->db->select($query);
		return $getdata;

	}
	public function insertData($data){

		$username = $this->fm->validation($data['username']);
		$descr = $this->fm->validation($data['descr']);

		$username = mysqli_real_escape_string($this->db->link, $username);
		$descr = mysqli_real_escape_string($this->db->link, $descr);

		$query = "INSERT INTO discussion(username, descr) VALUES('$username', '$descr')";
		$insered_row = $this->db->insert($query);
		/*if ($insered_row) {
			echo "<span class='success'> Successful</span>";
			exit();
		}else{
			echo "<span class='error'>Error... </span>";
			exit();
		}*/

	}
}

?>