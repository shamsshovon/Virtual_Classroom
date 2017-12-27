<?php include 'inc/header.php'; ?>
<?php 
 Session::checkSession();
 $question = $exm->getQuestion();
 $total = $exm->getTotalRow();
?>
<div class="main">
<h1>Virtual classroom Exam - Start Now</h1>
	
	<div class="starttest">
		<h2>Test Your knowledge</h2>
		<p>This is multiple choice QUIZ </p>
		<ul>
			<li><strong>Number of Questions:</strong> <?php echo $total;?></li>
			<li><strong>Questions type:</strong> Multiple Choice</li>
		</ul>
		<a href="test.php?q=<?php echo $question['q_no'];?>"> START TEST</a>
	</div>
	
  </div>
<?php include 'inc/footer.php'; ?>