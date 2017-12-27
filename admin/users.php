<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');
	$usr = new User();
?>

<?php
	if (isset($_GET['dis'])) {
		$dblid = (int)$_GET['dis'];
		$dblUser = $usr->DisableUser($dblid);
	}

	if (isset($_GET['ena'])) {
		$dblid = (int)$_GET['ena'];
		$dblUser = $usr->enableUser($dblid);
	}

	if (isset($_GET['del'])) {
		$dblid = (int)$_GET['del'];
		$dblUser = $usr->deleteUser($dblid);
	}
?>


<div class="main">
<h1>Admin Panel - Manage User</h1>
<?php 
	if (isset($dblUser))
		{
		echo $dblUser;
	}
?>
	<div class="manageuser">
		<table class="tblone">
			<tr>
				<th>User ID</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
			<?php
			$userData= $usr->getAllUser();
			if ($userData) {
				while ($value = $userData->fetch_assoc()) {

			?>

			<tr>
				<td>
				<?php
				if ($value['status']=='1'){
					echo "<span class='error'>".$value['userid']."</span>";
				} else {
							echo $value['userid'];
				}
				?>	
				</td>
				<td>
				<?php
				if ($value['status']=='1'){
					echo "<span class='error'>".$value['name']."</span>";
				} else {
							echo $value['name'];
				}
				?>	
					
				</td>
				<td>
				<?php
				if ($value['status']=='1'){
					echo "<span class='error'>".$value['username']."</span>";
				} else {
							echo $value['username'];
				}
				?>	
					
				</td>
				<td>
					<?php
				if ($value['status']=='1'){
					echo "<span class='error'>".$value['email']."</span>";
				} else {
							echo $value['email'];
				}
				?>	
				</td>
				<td>
				<?php if ($value['status']=='0') {?>
				 	<a onclick="return confirm('Are you sure to Disable')" href=" ?dis= <?php echo $value['userid'];?>">Disable</a>
				<?php } else {?>
					<a onclick="return confirm('Are you sure to Enable')" href=" ?ena= <?php echo $value['userid'];?>">Enable</a>
				 
				<?php } ?>
				 |
				<a onclick="return confirm('Are you sure to Remove')" href=" ?del= <?php echo $value['userid'];?>">Remove</a> 

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