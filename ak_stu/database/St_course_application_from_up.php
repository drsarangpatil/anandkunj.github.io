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
           $query1= "UPDATE ak_st_course_application SET person_id='". $_POST["person_id"]."', user_id='". $_POST["user_id"]."', doa='". $_POST["doa"]."', course_name='". $_POST["course_name"]."', ad_status='". $_POST["ad_status"]."', course_duration='". $_POST["course_duration"]."', doc='". $_POST["doc"]."', course_language='". $_POST["course_language"]."', mother_tongue='". $_POST["mother_tongue"]."', g_name='". $_POST["g_name"]."', g_relation='". $_POST["g_relation"]."', g_mobile='". $_POST["g_mobile"]."', g_email='". $_POST["g_email"]."', notify_via='". $_POST["notify_via"]."', adhar_no='". $_POST["adhar_no"]."', pan_no='". $_POST["pan_no"]."', qualifcation1='". $_POST["qualifcation1"]."', institute1='". $_POST["institute1"]."', grade1='". $_POST["grade1"]."', qualifcation2='". $_POST["qualifcation2"]."', institute2='". $_POST["institute2"]."', grade2='". $_POST["grade2"]."', qualifcation3='". $_POST["qualifcation3"]."', institute3='". $_POST["institute3"]."', grade3='". $_POST["grade3"]."', course1='". $_POST["course1"]."', org1='". $_POST["org1"]."', outcome1='". $_POST["outcome1"]."', course2='". $_POST["course2"]."', org2='". $_POST["org2"]."', outcome2='". $_POST["outcome2"]."', work_exprience='". $_POST["work_exprience"]."' WHERE st_course_application_id='" . $_POST["st_course_application_id"] ."'"; 
            
           
			//echo $query1;

			//run query 
			$return = mysqli_query($con, $query1); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
                echo "<script> alert('New Application Updated')</script>";
                
			}
			else	
				echo "<script> alert('No Application Updated')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}
	echo "<script> location.replace('../st_course_application_from_up.php'); </script>";

?>