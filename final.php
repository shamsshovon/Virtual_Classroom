<?php include 'inc/header.php'; ?>
<?php 
 Session::checkSession();
?>
<div class="main">
<h1>You are done</h1>
<div class="starttest">
		
		<p>Congrats ! you are just completes the test. </p>
		<p>Your Score: 
		<?php
			if (isset($_SESSION['score'])) {
				echo $_SESSION['score'];
				unset($_SESSION['score']);
			}
		?>
		</p>
		<a href="viewans.php"> View Answer</a>
		<a href="starttest.php"> START TEST</a>

	</div>
	
	
  </div>
<?php include 'inc/footer.php'; ?>