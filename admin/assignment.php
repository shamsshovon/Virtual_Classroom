<?php include 'inc/header.php'; ?>

 <style type="text/css">
 	.assignment{
 		width: 590px;
  		padding: 20px;
  		margin: 0 auto;
  		border-bottom: 1px solid #f4f4f4;
  	}
 </style>


<div class="main">
<h1>Assignment</h1>

	<div class="assignment">
		
		<table class="tblone"> 
			<tr>
				<th>Name</th>
				<th>Assignment list</th>
			</tr>
			<?php
					$query = "SELECT * FROM assignment";
					$desData = $db->select($query);
					if ($desData) {
						$i=0;
						while ($result = $desData->fetch_assoc()) {
							$i++;
				?>
			<tr>
				<td><?php echo $result['username'];?></td>
				<td><a href="<?php echo $result['file_name'];?>"><?php echo $i;?>. Assignment</a></td>	
			</tr>
			<?php } }?>
			
		</table>
		
		</div>
 </div>
<?php include 'inc/footer.php'; ?>