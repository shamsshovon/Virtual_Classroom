<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<style type="text/css">
	.admin-panel{
		width: 500px;
		color: #999;
		margin: 30px auto 0;
		padding: 50px;
		border: 1px solid #ddd;
	}
</style>
<div class="main">
<h1>Admin Panel</h1>
	<div class="admin-panel">
		<h2>Welcome to control Admin panel</h2>
		<p>You can manage your user and Virtual classroom from here...</p>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>