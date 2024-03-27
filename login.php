<html>
<head>
	<title>Server</title>
	<link rel="stylesheet" type="text/css" href="css_file.css">
</head>
<body>
	<p class="heading">PULL UP CLUB</p>
	<div class="loginbox">
	<img src="avatar.jpg" class="avatar">
		pulled up?<h1>LOG IN HERE</h1>
		<form method="POST" action="login_php_file.php">
			<p>Username:</p>
			<input type="text" name="username" placeholder="Enter Username" required>
			<p>Password:</p>
			<input type="password" name="password" placeholder="Enter Password" required><br>
			<input type="submit" name="submit" value="PULL IN" >
		</form>
		<form method="POST" action="admin_page.php">
			<input type="submit" name="admin_login" value="ADMIN?">
		</form>
	</div>
	</div>
</body>
</html>