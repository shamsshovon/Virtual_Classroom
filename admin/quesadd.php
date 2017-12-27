<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exm = new Exam();
?>
<style type="text/css">
	.admin-panel{
		width: 600px;
		color: #999;
		margin: 20px auto 0;
		padding: 30px;
		border: 1px solid #ddd;
	}
</style>
<?php
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$addQue=$exm->addQuestion($_POST);
	}

	$total = $exm->getTotalRow();
	$nextQue=$total+1;
?>

<div class="main">
<h1>Admin Panel - Add Question</h1>
<?php 
	if (isset($addQue)) 
	{
		echo $addQue;
	}
?>
	<div class="admin-panel">
		<form action="" method="post">
			<table>
				<tr>
					<td>Question No</td>
					<td>:</td>
					<td><input type="number" value="<?php if(isset($nextQue))echo $nextQue;?>" name="q_no"></td>
				</tr>
				<tr>
					<td>Question </td>
					<td>:</td>
					<td><input type="text" name="question" placeholder="Enter question..." required></td>
				</tr>
				<tr>
					<td>Option one</td>
					<td>:</td>
					<td><input type="text" name="ans1" placeholder="Enter Option one" required></td>
				</tr>
				<tr>
					<td>Option two</td>
					<td>:</td>
					<td><input type="text" name="ans2" placeholder="Enter Option two" required></td>
				</tr>
				<tr>
					<td>Option three</td>
					<td>:</td>
					<td><input type="text" name="ans3" placeholder="Enter Option three" required></td>
				</tr>
				<tr>
					<td>Option four</td>
					<td>:</td>
					<td><input type="text" name="ans4" placeholder="Enter Option four" required></td>
				</tr>
				<tr>
					<td>Correct No.</td>
					<td>:</td>
					<td><input type="number" name="rightAns" required></td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" value="Add a Question"></td>
				</tr>
			</table>
		</form>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>