<?php
	session_start();
	require 'config.php';

?>
<html>
<head>
	<title>Login Page</title>
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

				<h2>Log In</h2>
			</div>
				<form class="myform" action="login.php" method="post"><br>
					<label for="username">Username</label>
					<br/>
					<input name="username" type="text" class="inputvalues" required>
					<br/>
					<label for="password">Password</label>
					<br/>
					<input name="password" type="password" class="inputvalues" required>
					<br/>
					<input name="login" type="submit" class="login_btn" value="Login">
					<br/>
					<a href="register.php"><input type="button" id="register_btn" value="Register"></a>
				</form>
				<?php
					if(isset($_POST['login']))
					{
						$username=$_POST['username'];
						$password=$_POST['password'];
						
						$query="select * from userinfo WHERE username='$username' AND password='$password'";
						$query_run=mysqli_query($con,$query);

						if(mysqli_num_rows($query_run)>0)
						{
								//valid
								$_SESSION['username']=$username;
								header('location:homepage.php');
						}
						else
						{
							//invAalid
							echo '<script type="text/javascript"> alert("Inavlid credentials") </script>';
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
</script>
</html>