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
           $query1= "UPDATE ak_st_course_material_dispatch SET person_id='". $_POST["person_id"]."', st_course_application_id='". $_POST["st_course_application_id"]."', user_id='". $_POST["user_id"]."', dod='". $_POST["dod"]."', material_language='". $_POST["material_language"]."', mode_dispatch='". $_POST["mode_dispatch"]."', course_material='". $_POST["course_material"]."' WHERE st_course_material_id='" . $_POST["st_course_material_id"] ."'";
            
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
	echo "<script> location.replace('../st_course_material_dispatch_up.php'); </script>";

?>