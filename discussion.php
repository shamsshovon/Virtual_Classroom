<?php include 'inc/header.php'; ?>
 <?php
 	Session::checkSession();
 	$username = Session::get('user');
 ?>
 <!-- <?php
 	//if($_SERVER['REQUEST_METHOD'] == 'POST') {
 	//	$process = $pro->processData($_POST);
 	//}
 ?> -->
 <style type="text/css">
 	.discussion{
 		width: 590px;
  		padding: 20px;
  		margin: 0 auto;
  		border-bottom: 1px solid #f4f4f4;
  	}
  	textarea {
  		font-family: arial;
  		font-size: 16px;
  		font-weight: lighter;
  		margin-bottom: 10px;
  		padding: 12px;
	}
 	

 	input[type="submit"] {
  		cursor: pointer;
  		font-family: arial;
  		font-size: 22px;
  		padding: 5px 22px;
		}
 </style>

 <?php
 	if($_SERVER['REQUEST_METHOD'] == 'POST') 
	{
 		$insert = $pro->insertData($_POST);
 	}
 ?>

<div class="main">
<h1>Class Discussion</h1>

	<div class="discussion">

		
		<table class="tblone"> 
			<tr>
				<th>Name</th>
				<th>Description</th>
			</tr>
			<?php
					$desData = $pro->getDesData();
					if ($desData) {
						while ($result = $desData->fetch_assoc()) {
							
			?>
			<tr>
				<td><?php echo $result['username'];?></td>
				<td><?php echo $result['descr'];?></td>	
			</tr>
			<?php } }?>
			
		</table>

		<form method="post" action="">
			 <textarea rows="4" cols="50" name="descr"></textarea> <br>
			<input type="submit" name="" value="Post">
			<input type="hidden" name="username" value="<?php echo $username?>" />
		</form>
		
		
		</div>
 </div>
<?php include 'inc/footer.php'; ?>