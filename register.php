<?php
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$hour=11;
	$min=11;

	if (!empty($user) || !empty($pass)){ 
	$host="127.0.0.1";
	$dbusername="root";
	$dbpassword="";
	$dbname="regon";

	$conn=mysqli_connect ($host,$dbusername,$dbpassword,$dbname);

	if(mysqli_connect_error()){
		die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
	}
	else{
		$SELECT="SELECT user From info_table Where user=? Limit 1";
		$INSERT="INSERT into info_table(user,pass) values(?,?)";

		//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $user);
     $stmt->execute();
     $stmt->bind_result($user);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username this is the first time
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ss", $user,$pass);
      $stmt->execute();
      echo '<center><img src="regYES.png" style="height:400px"></center>';
      /*$sql="SELECT * from info_table where user='$user'";
 	  if($result=$conn->query($sql)){
 	  	if($result->num_rows){
 	  		while($row=$result->fetch_object()){
 	  			$sum= $row->pass;
 	  			$sum=$sum-10;
 	  			echo $sum;
 	  		}
 	  	}
 	  }*/
 	  echo '<form method="POST" action="login.php">
      		<br><style="font-family:Helvetica">Try Login?</style> <input type="submit" name="submit" value="Login">
      		</form>';
     } 
      else {
      	echo "<style='font-family:Helvetica'>The Username '$user' already exists</style>";
      	echo '<form method="POST" action="login.php">
      		<br><style="font-family:Helvetica">Try Login?</style> <input type="submit" name="submit" value="Login">
      		</form>';
      	echo '<center><img src="regNO.png" style="height:400px"></center>';
    	// $query="select * from info_table where user='$user' and pass='$pass'";
    	// $result=mysqli_query($conn,$query);
    	// $count=mysqli_num_rows($result);
    	// if($count>0){
    	// 	echo "Login Successful";
    	// }
    	// else{
    	// 	echo "Login Unsuccessful";
    	// }
      }
     $stmt->close();
     $conn->close();
    }
	}
	else {
 	echo "All field are required";
		die();
	}
?>