<?php
session_start();

?>
<html>
<head>
	<title>Home Page</title>
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
				<h3>Welcome
				<?php echo $_SESSION['username'] ?> 
				</h3>
				<form class="myform" action="homepage.php" method="post">
					<input name="logout" type="submit" id="logout_btn" value="Log Out">
				</form>
				<?php
				if(isset($_POST['logout']))
				{		
					session_destroy();
					header('location:login.php');
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
	</script>
</html>