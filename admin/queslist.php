<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exm = new Exam();
?>

<?php
	if(isset($_GET['delque'])){
		$queNo = (int) $_GET['delque'];
		$delQue = $exm->delQuestion($queNo);
	}
?>


<div class="main">
<h1>Admin Panel - Question List</h1>

	<div class="quelist">
		<table class="tblone">
			<tr>
				<th width="10%">No</th>
				<th width="75%">Questions</th>
				<th width="15%">Action</th>
			</tr>
			<?php
			$queData= $exm->getQueByOrder();
			if ($queData) {
				$i=0;
				while ($value = $queData->fetch_assoc()) {
					$i++;
			?>

			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $value['question'];?></td>
				<td>				
				<a onclick="return confirm('Are you sure to Remove')" href=" ?delque= <?php echo $value['q_no'];?>">Remove</a> 
				</td>
			</tr>

			<?php 
				}
			}

			?>
		</table>
	</div>
	
</div>
<?php include 'inc/footer.php'; ?>