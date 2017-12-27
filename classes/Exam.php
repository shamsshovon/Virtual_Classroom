<?php 

	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');


class Exam
{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db= new Database();
		$this->fm= new Format();
	}

	public function addQuestion($data){
		$q_no = $this->fm->validation($data['q_no']);
		$question = $this->fm->validation($data['question']);
		$ans = array();
		$ans[1] = $this->fm->validation($data['ans1']);
		$ans[2] = $this->fm->validation($data['ans2']);
		$ans[3] = $this->fm->validation($data['ans3']);
		$ans[4] = $this->fm->validation($data['ans4']);
		$rightAns = $this->fm->validation($data['rightAns']);

		$q_no= mysqli_real_escape_string($this->db->link, $q_no);
		$question= mysqli_real_escape_string($this->db->link, $question);
		$query= "INSERT INTO question(q_no,question) VALUES('$q_no', '$question')";
		$insert_row = $this->db->insert($query);

		if ($insert_row) {
			foreach ($ans as $key => $answer) {
				if ($answer != '') {
					if ($rightAns==$key) {
						$query= "INSERT INTO answer(q_no, right_ans, ans) VALUES('$q_no','1' ,'$answer')";
					} else{
						$query= "INSERT INTO answer(q_no,right_ans,ans) VALUES('$q_no','0','$answer')";
					}
					$insertrow = $this->db->insert($query);
					if ($insertrow) {
						continue;
					} else{
						die('Error...');
					}

				}
			}
			$msg = "<span class='success'>Question added</span>";
		}
		return $msg;
	}

	public function delQuestion($q_no){
		$tables = array("question","answer");
		foreach ($tables as $value) {
			$delquery = "DELETE FROM $value WHERE q_no='$q_no' ";
			$deldata = $this->db->delete($delquery);
		}
		if ($deldata) {
			$msg = "<span class='success'> Data Deleted..!</span>";
			return $msg;
		}else{
			$msg = "<span class='error'> Data not Deleted..!</span>";
			return $msg;
		}
	}

	public function getQueByOrder(){
		$query = "SELECT * FROM question ORDER BY q_no ASC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getTotalRow(){
		$query = "SELECT * FROM question";
		$getResult = $this->db->select($query);
		$total = $getResult->num_rows;
		return $total;
	}

	public function getQuestion(){
		$query = "SELECT * FROM question";
		$getdata = $this->db->select($query);
		$result = $getdata->fetch_assoc();
		return $result;
	}

	public function getQuesByNumber($number){
		$query = "SELECT * FROM question WHERE q_no='$number'";
		$getdata = $this->db->select($query);
		$result = $getdata->fetch_assoc();
		return $result;
	}

	public function getAnswer($number){
		$query = "SELECT * FROM answer WHERE q_no='$number'";
		$getdata = $this->db->select($query);
		return $getdata;
	}
}

?>