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
           $query1= "INSERT INTO ak_st_course_application (person_id, user_id, doa, course_name, ad_status, course_duration, doc, course_language, mother_tongue, g_name, g_relation, g_mobile, g_email, notify_via, adhar_no, pan_no, qualifcation1, institute1, grade1, qualifcation2, institute2, grade2, qualifcation3, institute3, grade3, course1, org1, outcome1, course2, org2, outcome2, work_exprience) VALUES ('". $_POST["person_id"]."', '". $_POST["user_id"]."', '". $_POST["doa"]."', '". $_POST["course_name"]."', '". $_POST["ad_status"]."', '". $_POST["course_duration"]."', '". $_POST["doc"]."', '". $_POST["course_language"]."', '". $_POST["mother_tongue"]."', '". $_POST["g_name"]."', '". $_POST["g_relation"]."', '". $_POST["g_mobile"]."', '". $_POST["g_email"]."', '". $_POST["notify_via"]."', '". $_POST["adhar_no"]."', '". $_POST["pan_no"]."', '". $_POST["qualifcation1"]."',  '". $_POST["institute1"]."',  '". $_POST["grade1"]."',  '". $_POST["qualifcation2"]."', '". $_POST["institute2"]."', '". $_POST["grade2"]."', '". $_POST["qualifcation3"]."', '". $_POST["institute3"]."', '". $_POST["grade3"]."', '". $_POST["course1"]."', '". $_POST["org1"]."', '". $_POST["outcome1"]."', '". $_POST["course2"]."', '". $_POST["org2"]."', '". $_POST["outcome2"]."', '". $_POST["work_exprience"]."')";
            
           
            
			//echo $query1;

			//run query 
			$return = mysqli_query($con, $query1); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
                echo "<script> alert('New Application Added')</script>";
                
                //create  select query
                $query2= "SELECT st_course_application_id FROM ak_st_course_application WHERE person_id='". $_POST["person_id"]."' and doa='". $_POST["doa"]."'";
                
                //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $st_course_application_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $st_course_application_id=$record[0];
                }
                
			}
			else	
				echo "<script> alert('No Application Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}
	echo "<script> location.replace('../st_course_application_from.php'); </script>";

?>