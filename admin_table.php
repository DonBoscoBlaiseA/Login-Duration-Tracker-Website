<html>
<head><title>Admin Login</title>
	<!-- <link rel="stylesheet" type="text/css" href="css_file.css"> -->
	<style>
		.dbresult,.dbresult td,.dbresult th{
			background-color: ;
			border: 1px solid black;
			border-collapse:  collapse;
			padding:  8px;
		}
		.dbresult{
			heigh:  80%;
			width:  80%;
			margin:  auto;
		}
	</style>
</head>
<body>
</body>
</html>

<?php
	$admin_username="NIL";
	if(isset($_POST["submit"])){
		$admin_username=$_POST["username"];
		$admin_password=$_POST["password"];
	}
	if($admin_username=="ADMIN" && $admin_password=="admin"){
		$host="127.0.0.1";
		$dbusername="root";
		$dbpassword="";
		$dbname="wt_table";
		$conn=mysqli_connect ($host,$dbusername,$dbpassword,$dbname);
		if(mysqli_connect_error()){
			die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
		}
		else{
			$query= "SELECT * from info_table2";
			$result=mysqli_query($conn,$query);
			$numrow=mysqli_num_rows($result);
			if($numrow>0){
				echo '<table class="dbresult">';
				echo '<tr>';
				echo '<th>USERNAME</th>';
				echo '<th>LOGIN_HOUR</th>';
				echo '<th>LOGIN_MIN</th>';
				echo '<th>LOGOUT_HOUR</th>';
				echo '<th>LOGOUT_MIN</th>';
				echo '<th>WORKING_TIME_HOUR</th>';
				echo '<th>WORKING_TIME_MIN</th>';
				echo '</tr>';
				while($row=mysqli_fetch_assoc($result)){
					echo '<tr>';
					echo '<th>'.$row['user'].'</th>';
					echo '<th>'.$row['login_h'].'</th>';
					echo '<th>'.$row['login_m'].'</th>';
					echo '<th>'.$row['logout_h'].'</th>';
					echo '<th>'.$row['logout_m'].'</th>';
					echo '<th>'.$row['wt_hour'].'</th>';
					echo '<th>'.$row['wt_min'].'</th>';
					echo '</tr>';
				}
				echo '</table>';
			}
			else{
				echo "No records found";
			}
			
		}
		$conn->close();
	}
	else{
		echo 'The given credentials is wrong! <form method="POST" action="admin_page.php">
			<input type="SUBMIT" name="submit" value="LOGIN AGAIN?">
			</form>';
	}
	

?>