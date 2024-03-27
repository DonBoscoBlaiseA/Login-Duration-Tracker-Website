<?php
	session_start();
	$user= $_SESSION['user'];
	if (!empty($user)){
            $host="127.0.0.1";
            $dbusername="root";
            $dbpassword="";
            $dbname="regon";

            $conn=mysqli_connect ($host,$dbusername,$dbpassword,$dbname);

            $sql="SELECT hour,min from info_table where user='$user'";
		 	if($result=$conn->query($sql)){
		 	  	if($result->num_rows){
		 	  		while($row=$result->fetch_object()){
		 	  			$hour= $row->hour;
		 	  			$min= $row->min;
		 	  			$calc_h= $hour;
		 	  			$calc_m= $min;
		 	  			date_default_timezone_set('Asia/Kolkata');
                        $hourp= date('H');
                        $minp= date('i');

                        if($hourp>$calc_h){ $dur_h= $hourp-$calc_h; }
                        else{ $dur_h=$calc_h-$hourp; }

                        if($minp>$calc_m){ $dur_m= $minp-$calc_m; }
                        else{ $dur_m=$calc_m-$minp; }

                        // $dur_h= $hourp-$calc_h;
                        // $dur_m= $minp-$calc_m;

                        echo "You have been in the webpage for ".$dur_h."hours and ".$dur_m."minutes";
                        session_destroy();

                        session_start();
                        $_SESSION['user']=$user;
                        $_SESSION['hourp']=$hourp;
                        $_SESSION['minp']=$minp;
                        $_SESSION['calc_h']=$calc_h;
                        $_SESSION['calc_m']=$calc_m;
                        $_SESSION['dur_h']=$dur_h;
                        $_SESSION['dur_m']=$dur_m;

                        echo '<center><form method="POST" action="working_time.php">
                              <input type="submit" name="submit" value="EXIT">
                              </form></center>';

		 	  		}
		 	  	}
		 	}


            $conn->close();
    }
    else{
     	echo "Error";
    }
?>