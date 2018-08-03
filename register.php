<?php
   require 'config.php';

?>
<html>
<head>
	<title>Registration Page</title>
	<meta charset="utf-8">
	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
	<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">EV-<span>ORG</span></span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
			</div>
		
		
		<form class="myform" action="register.php" method="post">
			<label for="username">Username</label>
			<br/>
			<input name="username" type="text" required/>
			<br/>
			<label for="password">Password</label>
			<br/>
			<input name="password" type="password" required/>
			<br/>
			<label for="cpassword">Confirm Password</label>
			<br/>
			<input name="cpassword" type="password" required/>
			<br/>
			<input name="submit_btn" type="submit" class="sign_up" value="Sign-Up">
			<br/>
			<a href="login.php"><input type="button" id="back_btn" value="Back"></a>
		</form>
			<?php
				if(isset($_POST['submit_btn']))
				{
					//echo '<script type="text/javascript"> alert("Sign-Up button clicked") </script> ' ; 
					$username = $_POST['username'];
					$password = $_POST['password'];
					$cpassword = $_POST['cpassword'];

					if ($password==$cpassword)
					{
						$query = "select * from userinfo WHERE username = '$username' ";

						$query_run = mysqli_query($con,$query);
						//$x=mysqli_num_rows($query_run);
						//echo '<script type="text/javascript"> alert(x) </script>';
						if(mysqli_num_rows($query_run)>0)
						{
							//already exist	
							echo '<script type="text/javascript"> alert("username  already exists") </script>';
						}
						else
						{
							$query = "insert into userinfo values('$username','$password')";
							$query_run = mysqli_query($con,$query);
							if($query_run)
							{
								echo '<script type="text/javascript"> alert("User  registered") </script>';
							}						
							else
							{
								echo '<script type="text/javascript"> alert("Error!!!!") </script>';
							}
						}
					}
					else
					{
						echo '<script type="text/javascript"> alert("pass and confirm password does not match") </script>';
					}
				}
				
			?>
		</div>
		</div>
	</body>
	<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
	$('#cpassword').focus(function() {
		$('label[for="cpassword"]').addClass('selected');
	});
	$('#cpassword').blur(function() {
		$('label[for="cpassword"]').removeClass('selected');
	});
</script>

</html>