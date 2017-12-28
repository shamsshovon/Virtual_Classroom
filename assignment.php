<?php include 'inc/header.php'; ?>
 <?php
 	Session::checkSession();
 	$username = Session::get('user');
 ?>
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
				<th>Assignment list</th>
			</tr>
			<?php
					$query = "SELECT * FROM assignment WHERE username='$username'";
					$desData = $db->select($query);
					if ($desData) {
						$i=0;
						while ($result = $desData->fetch_assoc()) {
							$i++;
				?>
			<tr>
				<td><a href="<?php echo $result['file_name'];?>"><?php echo $i;?>. Assignment</a></td>	
			</tr>
			<?php } }?>
			
		</table>


			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {

					$uname = $_POST['username'];

					$permited = array('pdf','doc','docx');
					$file_name = $_FILES['file']['name'];
					$file_size = $_FILES['file']['size'];
					$file_temp = $_FILES['file']['tmp_name'];

					$div = explode('.', $file_name);
					$file_ext = strtolower(end($div));
					$unique_file = substr(md5(time()), 0,10).'.'.$file_ext;
					$uploaded_file = "uploads/".$unique_file;

					if (empty($file_name)) {
						echo "<span class='error'>Please select a file</span>";
					} else if (in_array($file_ext, $permited) === false) {
						echo "<span class='error'> you can upload only: ".implode(',', $permited)."</span>";
					}else{

						move_uploaded_file($file_temp, $uploaded_file);
						$query = "INSERT INTO assignment(username, file_name) VALUES('$uname','$uploaded_file')";
						$inseted_rows = $db->insert($query);
						if ($inseted_rows) {
							echo "<span class='success'>File upload  Successfully</span>";
						}else{
							echo "<span class='error'>File not uploaded</span>";
						}
					}
				}
			?>





		<form action="" method="post" enctype="multipart/form-data">
				<table>
					<tr>
						<td>Select File (pdf or doc )____</td>
						<td><input type="file" name="file"></td>
					</tr>
					<tr>
						<td><input type="hidden" name="username" value="<?php echo $username?>" /></td>
						<td><input type="submit" name="submit" value="Upload file"></td>
					</tr>
				</table>
		</form>
		
		</div>
 </div>
<?php include 'inc/footer.php'; ?>
