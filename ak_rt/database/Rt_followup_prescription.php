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
           $query1= "INSERT INTO ak_rt_followup (person_id, rt_case_sheet_id, followup_date, schedule, user_id, followup_day, complaints, weight, height, bmi, bp, oe, investigations) VALUES ('". $_POST["person_id"]."', '". $_POST["rt_case_sheet_id"]."', '". $_POST["followup_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["followup_day"]."', '". $_POST["complaints"]."', '". $_POST["weight"]."', '". $_POST["height"]."', '". $_POST["bmi"]."', '". $_POST["bp"]."', '". $_POST["oe"]."', '". $_POST["investigations"]."')";
            
			//echo $query1;

			//run query 
			$return = mysqli_query($con, $query1); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
                echo "<script> alert('New RT Followup Record Added')</script>";
                
                //create  select query
                $query2= "SELECT rt_followup_id FROM ak_rt_followup WHERE person_id='". $_POST["person_id"]."' and followup_date='". $_POST["followup_date"]."'";
                
               //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $rt_followup_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $rt_followup_id=$record[0];
                }
                
                {
                    $query5= "INSERT INTO ak_rt_followup_medicine (person_id, rt_case_sheet_id, rt_followup_id, followup_date, schedule, user_id, medicine_names) VALUES ('". $_POST["person_id"]."', '". $_POST["rt_case_sheet_id"]."', '". $rt_followup_id ."', '". $_POST["followup_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["medicine_prescriptions"]."')";
                    
                    
                     //echo $query5 . "<br>";

                    //run query 
                    $return = mysqli_query($con, $query5); 

                    //check fired query output
                    if (mysqli_affected_rows($con))
                    {		
                        echo "<script> alert('New Medicine Followup Prescription Added')</script>";
                    }
                    else	
                        echo "<script> alert('New Medicine Followup Prescription Not Added')</script>";
                }
               
                {
                   
                  $query= "INSERT INTO ak_rt_followup_lifestyle (person_id, rt_case_sheet_id, rt_followup_id, followup_date, schedule, user_id, life_style_instructions) VALUES ('". $_POST["person_id"]."', '". $_POST["rt_case_sheet_id"]."', '". $rt_followup_id ."', '". $_POST["followup_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["life_style_prescriptions"] ."')";
                    
                    //echo $query;
                    //run query 
                    $return = mysqli_query($con, $query); 

                    //check fired query output
                    if (mysqli_affected_rows($con))
                    {		
                        echo "<script> alert('New LS Followup Instructions Added')</script>";
                    }
                    else	
                        echo "<script> alert('New LS Followup Instructions Not Added')</script>";
                }
                
			}
			else	
				echo "<script> alert('New RT Followup Record Not Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}


    echo "<script> window.open('../reports/print/Rt_followup_med_prescription_print.php?fuid=" . $rt_followup_id ."' ,'_blank'); </script>";

     echo "<script> window.open('../reports/print/Rt_followup_ls_prescription_print.php?fuid=" . $rt_followup_id ."' ,'_blank'); </script>";

    echo "<script> window.open('../reports/print/Rt_testimonial_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

     echo "<script> window.open('../reports/print/Rt_feedback_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

    
	echo "<script> location.replace('../rt_followup_prescription.php'); </script>";

?>