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
           $query1= "INSERT INTO ak_direct_visit (prescription_date, schedule, user_id, full_name, age, gender, mobile_no, complaints, weight, bp, oe, final_diagnosis) VALUES ('". $_POST["prescription_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["full_name"]."', '". $_POST["age"]."', '". $_POST["gender"]."', '". $_POST["mobile_no"]."', '". $_POST["complaints"]."', '". $_POST["weight"]."', '". $_POST["bp"]."', '". $_POST["oe"]."', '". $_POST["final_diagnosis"]."')";
            
			//echo $query1;

			//run query 
			$return = mysqli_query($con, $query1); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
                echo "<script> alert('Direct Visit Record Added')</script>";
                
                //create  select query
                $query2= "SELECT direct_visit_id FROM ak_direct_visit WHERE full_name='". $_POST["full_name"]."' and prescription_date='". $_POST["prescription_date"]."'";
                
                //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $direct_visit_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $direct_visit_id=$record[0];
                }
                
              
                {
                    $query5= "INSERT INTO ak_dir_medicine_prescription (direct_visit_id, prescription_date, schedule, user_id, medicine_names) VALUES ( '". $direct_visit_id ."', '". $_POST["prescription_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["medicine_prescriptions"] ."')";
                    
                    
                    //echo $query5 . "<br>";

                    //run query 
                    $return = mysqli_query($con, $query5); 

                    //check fired query output
                    if (mysqli_affected_rows($con))
                    {		
                        echo "<script> alert('Medicines Added')</script>";
                    }
                    else	
                        echo "<script> alert('Medicines Not Added')</script>";
                }
                
			}
			else	
				echo "<script> alert('Visit Record Not Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}
    echo "<script> window.open('../reports/print/Dir_medicine_prescription_print.php?vsid=" . $direct_visit_id ."' ,'_blank'); </script>";

	echo "<script> location.replace('../dir_medicine_prescription.php'); </script>";

?>