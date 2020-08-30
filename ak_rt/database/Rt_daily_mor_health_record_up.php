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
                $query1="DELETE FROM ak_rt_daily_treatment_prescription WHERE schedule= 'Morning' and daily_date='". $_POST["daily_date"] ."'";
                
                $return = mysqli_query($con, $query1); 

                //echo $query1 . "<br>"; 
                
                $lines = explode("\n",$_POST["treatment_prescriptions"]); // explode the fetched lines
                for($i = 0; $i < count($lines); $i++)
                {
                    
                    $exploded_data=explode("~~",$lines[$i]); // further explode the exploded lines
                    
                    $exploded_data[1] = str_replace("\n",'', $exploded_data[1]);
                    $exploded_data[1] = str_replace("\r",'', $exploded_data[1]);
                    
                    $query3= "INSERT INTO ak_rt_daily_treatment_prescription (person_id, rt_case_sheet_id, daily_date, schedule, user_id, treatment_name, therapy_dept, treatment_time, therapist_name, treat_instructions) VALUES ('". $_POST["person_id"]."', '". $_POST["rt_case_sheet_id"]."', '". $_POST["daily_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $exploded_data[0] ."', '". $exploded_data[1] ."', '". $exploded_data[2] ."', '". $exploded_data[3] ."', '". $exploded_data[4] ."')";
                    
                     //echo $query3 . "<br>";

                    //run query 
                    $return = mysqli_query($con, $query3); 

                    //check fired query output
                    if (mysqli_affected_rows($con))
                    {		
                        echo "<script> alert('Treatments Updated')</script>";
                    }
                    else	
                        echo "<script> alert('Treatments Not Updated')</script>";
                }
                
                $query1="DELETE FROM ak_rt_daily_diet_prescription WHERE schedule= 'Morning' and daily_date='". $_POST["daily_date"] ."'";
                
                $return = mysqli_query($con, $query1);

                //echo $query1 . "<br>"; 
                
                $lines = explode("\n",$_POST["diet_prescriptions"]); // explode the fetched lines
                for($i = 0; $i < count($lines); $i++)
                {
                    
                    $exploded_data=explode("~~",$lines[$i]); // further explode the exploded lines
                    
                    $exploded_data[1] = str_replace("\n",'', $exploded_data[1]);
                     $exploded_data[1] = str_replace("\r",'', $exploded_data[1]);
                    
                    $query4= "INSERT INTO ak_rt_daily_diet_prescription (person_id, rt_case_sheet_id, daily_date, schedule, user_id, morning_diet, noon_diet, afternoon_diet, evening_diet, instruc) VALUES ('". $_POST["person_id"]."', '". $_POST["rt_case_sheet_id"]."', '". $_POST["daily_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $exploded_data[0] ."', '". $exploded_data[1] ."', '". $exploded_data[2] ."', '". $exploded_data[3] ."', '". $exploded_data[4] ."')";
                    
                     //echo $query4 . "<br>";

                    //run query 
                    $return = mysqli_query($con, $query4); 

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
	echo "<script> location.replace('../rt_daily_mor_health_record_up.php'); </script>";

?>