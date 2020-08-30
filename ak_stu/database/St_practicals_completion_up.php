<?php
	//create connection
	include_once('Config.php');
    $data = new myConfig();

	$con = mysqli_connect($data->host, $data->user,$data->password,$data->db);
		
	//confirm connection
	if ($con)
	{
		mysqli_set_charset( $con, 'utf8' );
		
		{  
			//create  insert query
            
           $query1= "UPDATE  ak_st_practicals_completion SET person_id='". $_POST["person_id"]."', st_course_application_id='". $_POST["st_course_application_id"]."', user_id='". $_POST["user_id"]."', d_o_s='". $_POST["d_o_s"]."', d_o_c='". $_POST["d_o_c"]."',  mode_practice='". $_POST["mode_practice"]."', incharge='". $_POST["incharge"]."', practical_name='". $_POST["practical_name"]."', grade_secu='". $_POST["grade_secu"]."', practicals_completed='". $_POST["practicals_completed"]."' WHERE st_practicals_completion_id='" . $_POST["st_practicals_completion_id"] ."'";
            
			//echo $query1;

			//run query 
			$return = mysqli_query($con, $query1); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
                echo "<script> alert('Record Updated')</script>";
                
                //create  select query
                /*$query2= "SELECT st_course_application_id FROM ak_st_course_application WHERE person_id='". $_POST["person_id"]."' and doa='". $_POST["doa"]."'";
                
                //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $st_course_application_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $st_course_application_id=$record[0];
                }*/
                
			}
			else	
				echo "<script> alert('No Record Updated')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}
	echo "<script> location.replace('../st_practicals_completion_up.php'); </script>";

?>