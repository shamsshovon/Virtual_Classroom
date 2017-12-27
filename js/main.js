$(function(){
	// for user registration
	$("#regSubmit").click(function(){
		var name = $("#name").val();
		var username = $("#username").val();
		var password = $("#password").val();
		var email = $("#email").val();

		var dataString = 'name='+name+'&username='+username+'&password='+password+'&email='+email;
		$.ajax({
			type:"POST",
			url:"getregister.php",
			data: dataString,
			success: function(data){
				$("#status").html(data);
			}
		});
		return false;
	});

	// for user login
	$("#loginsubmit").click(function(){
		var email = $("#email").val();
		var password = $("#password").val();
		
		var dataString = 'email='+email+'&password='+password;
		$.ajax({
			type:"POST",
			url:"getlogin.php",
			data: dataString,
			success: function(data){
				if ($.trim(data)=="empty") {
					$(".empty").show();
					setTimeout(function(){
						$(".empty").fadeOut();
					},5000);
					

				} else if ($.trim(data)=="disable") {
					
					$(".disable").show();
					setTimeout(function(){
						$(".disable").fadeOut();
					},5000);

				}else if ($.trim(data)=="error") {
					
					$(".error").show();
					setTimeout(function(){
						$(".error").fadeOut();
					},5000);

				}else{
					window.location = "profile.php";
				}
			}
		});
		return false;
	});
});