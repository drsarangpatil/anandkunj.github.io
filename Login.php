<?php
	//create connection
	include_once('./ak_com/database/Config.php');
    
	/* for session */
	if(session_id() == '') 
		session_start();
	/* for session */

    $data = new myConfig();

	$con = mysqli_connect($data->host,$data->user,$data->password,$data->db);
	//confirm connection
	if ($con)
	{
		mysqli_set_charset( $con, 'utf8' );
		
		//create query
		$query = "SELECT p.photo, p.full_name, s.staff_short_name, s.role FROM ak_p_registration p, ak_staff_other_info s WHERE s.staff_short_name= '" . $_POST["user_id"]. "' and s.password= '" . $_POST["password"] . "'";
        $query = $query . " and p.person_id  = s.person_id";
        
        //$query = "SELECT * FROM ak_staff_other_info WHERE staff_short_name= '" . $_POST["user_id"]. "' and password= '" . $_POST["password"] . "'";
		
        //echo $query;
		//run query 
		$return = mysqli_query($con, $query);
        //echo $return;
        if($row = mysqli_fetch_array($return)) 
        {
           $_SESSION["user_photo"]= $row[0];
           //echo $_SESSION["user_photo"];
            
            $_SESSION["user_name"]= $row[1];
           //echo $_SESSION["user_name"];
            
            $_SESSION["user_id"]= $row[2];
           //echo $_SESSION["user_id"];
            
            $_SESSION["role"]= $row[3];
           //echo $_SESSION["role"];
            
            //$_SESSION["user_name"]=$_POST['user_name']; //$_SESSION["username"]=$row[2];

            echo "<script language='javascript'>alert('Welcome : ' " . $row[1] .")</script>";
            
            // divert to specific menu for specific role 
            
           if($_SESSION["role"] === "Director"){
                echo "<script> location.replace('./ak_com/index.php'); </script>";
                }
            if($_SESSION["role"] === "Office Staff"){
                echo "<script> location.replace('./ak_op/index.php'); </script>";
                }
            if($_SESSION["role"] === "Account Staff"){
                echo "<script> location.replace('./ak_ac/index.php'); </script>";
                }
            if($_SESSION["role"] === "Doctor"){
               echo "<script> location.replace('./ak_op/index.php'); </script>";
                }
        }	  
        else	
        {
            echo "<script language='javascript'>alert('Invalid User Name or Password')</script>";
            echo "<script> location.replace('index.php'); </script>";
        }
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}
    mysqli_close($con);
?>