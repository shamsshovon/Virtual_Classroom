<?php include 'inc/header.php'; ?>
 <?php
 	Session::checkSession();
 	$total=$exm->getTotalRow();
 ?>

<div class="main">
<h1>Question solution <?php echo $total; ?></h1>
	<div class="test">
		<table>
		<?php 

		$getQue = $exm->getQueByOrder();
		if ($getQue) {
			while ($question = $getQue->fetch_assoc()) {
				
		?>
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['q_no']; ?>: <?php echo $question['question']; ?></h3>
				</td>
			</tr>

				<?php

					$answer = $exm->getAnswer($question['q_no']);
					if ($answer) {
						while ($result = $answer->fetch_assoc()) {
				?>
			<tr>
				<td>
				 <?php 
				 	if($result['right_ans']=='1'){
				 		echo "<span style='color: green'>".$result['ans']."</span>";
				 	}else{
				 		echo $result['ans'];
				 	}
				 	
				 ?>
				</td>
			</tr>
			<?php } }?>

			<?php } }?>			
		</table>
	</div>
 </div>
<?php include 'inc/footer.php'; ?>