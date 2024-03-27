<?php
      $user=$_POST['username'];
      $pass=$_POST['password'];

      if (!empty($user) || !empty($pass)){
            $host="127.0.0.1";
            $dbusername="root";
            $dbpassword="";
            $dbname="regon";

            $conn=mysqli_connect ($host,$dbusername,$dbpassword,$dbname);

          	$query="select * from info_table where user='$user' and pass='$pass'";
            
                	$result=mysqli_query($conn,$query);
                	$count=mysqli_num_rows($result);
                	if($count>0){
                		echo '<center><img src="logYES.png" style="height:400px"></center>';
                        // get time
                        date_default_timezone_set('Asia/Kolkata');
                        $hourp= date('H');
                        $minp= date('i');
                        //echo $hourp,$minp;
                        //getting time to compare login time
                        $query2= "UPDATE info_table SET hour='$hourp' WHERE user='$user'";
                        $result2=mysqli_query($conn,$query2);
                        $query3= "UPDATE info_table SET min='$minp' WHERE user='$user'";
                        $result3=mysqli_query($conn,$query3);
                        
                        session_start();
                        $_SESSION['user']=$user;

                        echo '<center><form method="POST" action="login_get_time.php">
                              <input type="submit" name="submit" value="LOG OUT">
                              </form></center>';

                        
                        // echo '<center><form method="POST" action="order.php">
                        //       <input type="SUBMIT" name="submit" value="OPEN UP">
                        //       </form></center>';

                        // echo '<a href="order.php" style="font-family:Helvetica">Order Up?</a>';
                	}
                	else{
                		echo '<center><img src="logNO.png" style="height:400px"></center>';
                	}
            $conn->close();
      }

?>