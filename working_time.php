<?php
	session_start();
	$user= $_SESSION['user'];
	$hourp= $_SESSION['hourp'];
	$minp= $_SESSION['minp'];
	$calc_h= $_SESSION['calc_h'];
	$calc_m= $_SESSION['calc_m'];
	$dur_h= $_SESSION['dur_h'];
	$dur_m= $_SESSION['dur_m'];
	// echo "Calc time is : ".$user." and ".$calc_m." and ".$dur_m;
	//connection to db
	if (!empty($user) || !empty($hourc) || !empty($minc) || !empty($calc_h) || !empty($calc_m) || !empty($dur_h)|| !empty($dur_m)){
            $host="127.0.0.1";
            $dbusername="root";
            $dbpassword="";
            $dbname="wt_table";

            $con=mysqli_connect ($host,$dbusername,$dbpassword,$dbname);
            if(mysqli_connect_error()){
				die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
			}
			else{
				// echo "Calc time is : ".$user." and ".$calc_m." and ".$dur_m;
				$sql="INSERT into info_table2(user,login_h,login_m,logout_h,logout_m,wt_hour,wt_min) values('$user',$calc_h,$calc_m,$hourp,$minp,$dur_h,$dur_m)";
				// $result=mysqli_query($con,$sql);

			if ($con->query($sql) === TRUE) {
			  echo "See you next time :)";
			}
			else {
			  echo "Error: " . $sql . "<br>" . $con->error;
			}
				
		    
		}
		    $con->close();
	}
    else{
    	echo "Error";
    }
?>