<html>
<head>
	<title>Server</title>
	<link rel="stylesheet" type="text/css" href="css_file.css">
</head>
<body>
	<p class="heading">PULL UP CLUB</p>
	<div class="loginbox">
	<img src="avatar.jpg" class="avatar">
		pull up?<h1>SIGN UP HERE</h1>
		<form method="POST" action="register.php">
			<p>Username:</p>
			<input type="text" name="username" placeholder="Enter Username" required>
			<p>Password:</p>
			<input type="password" name="password" placeholder="Enter Password" required><br>
			<input type="submit" name="submit" value="PULL UP">
		</form>
		<!-- <form method="POST" action="login.php"> -->
			<a href="login.php" style="font-family:Helvetica; color: white">Already have an account?</a>
			<!-- <input type="submit" name="Login" value="LOG IN"> -->
		<!-- </form> -->
	</div>
	</div>
</body>
</html>