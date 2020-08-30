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
            $query1="DELETE FROM ak_op_treatment_prescription WHERE op_visit_id='". $_POST["op_visit_id"] ."'";
                
            $return = mysqli_query($con, $query1);
                
            //echo $query1 . "<br>";  
                        
            $lines = explode("\n",$_POST["treatment_prescriptions"]);
            for($i = 0; $i < count($lines); $i++)
            {
                $exploded_data=explode("~~",$lines[$i]);

                //create query
               $query= "INSERT INTO ak_op_treatment_prescription (person_id, op_case_sheet_id, op_visit_id, visit_date, schedule, user_id, treatment_name, therapy_dept, treatment_time, therapist_name, treat_instructions) VALUES ('". $_POST["person_id"]."', '". $_POST["op_case_sheet_id"]."', '". $_POST["op_visit_id"]."', '". $_POST["visit_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $exploded_data[0] ."', '". $exploded_data[1] ."', '". $exploded_data[2] ."', '". $exploded_data[3] ."', '". $exploded_data[4] ."')";

                //echo $query;

                //run query 
                $return = mysqli_query($con, $query); 

                //check fired query output
                if (mysqli_affected_rows($con))
                {		
                    echo "<script> alert('Treatment Updated')</script>";
                }
                else	
                    echo "<script> alert('Treatment Not Updated')</script>";
		     }
            
            $query1="DELETE FROM ak_op_diet_prescription WHERE op_visit_id='". $_POST["op_visit_id"] ."'";
                
            $return = mysqli_query($con, $query1);
                
            //echo $query1 . "<br>";  
                        
            $lines = explode("\n",$_POST["diet_prescriptions"]);
            for($i = 0; $i < count($lines); $i++)
            {
                $exploded_data=explode("~~",$lines[$i]);
                           
                //create query
               $query= "INSERT INTO ak_op_diet_prescription (person_id, op_case_sheet_id, op_visit_id, visit_date, schedule, user_id, morning_diet, noon_diet, afternoon_diet, evening_diet, instruc) VALUES ('". $_POST["person_id"]."', '". $_POST["op_case_sheet_id"]."', '". $_POST["op_visit_id"]."', '". $_POST["visit_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $exploded_data[0] ."', '". $exploded_data[1] ."', '". $exploded_data[2] ."', '". $exploded_data[3] ."', '". $exploded_data[4] ."')";;

                //echo $query;
                //run query 
                $return = mysqli_query($con, $query); 

                //check fired query output
                if (mysqli_affected_rows($con))
                {		
                    echo "<script> alert('Diet Updated')</script>";
                }
                else	
                    echo "<script> alert('Diet Not Updated')</script>";
		   }
      }
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}


	echo "<script> location.replace('../op_treatment_diet_up.php'); </script>";

?>