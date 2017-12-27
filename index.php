<?php include 'inc/header.php'; ?>

<?php 
 Session::checkLogin();
?>
<div class="main">
<h1>Virtual Classroom - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table class="tbl">    
			 <tr>
			   <td>Email</td>
			   <td><input name="email" type="text" id="email"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input name="password" type="password" id="password"></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" name="login" value="Login" id="loginsubmit">
			   </td>
			 </tr>
       </table>
	   </form>
	   <p>New User ? <a href="register.php">Signup</a></p>
	   <span class="empty" style="display: none;">Field must not be empty..!</span>
	   <span class="disable" style="display: none;">Sorry,You are disable</span>
	   <span class="error" style="display: none;">Email or password not matched </span>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>