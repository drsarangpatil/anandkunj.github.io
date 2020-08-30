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
           $query1= "INSERT INTO ak_op_visit (person_id, op_case_sheet_id, visit_date, schedule, user_id, complaints, weight, bp, oe) VALUES ('". $_POST["person_id"]."', '". $_POST["op_case_sheet_id"]."', '". $_POST["visit_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["complaints"]."', '". $_POST["weight"]."', '". $_POST["bp"]."', '". $_POST["oe"]."')";
            
			//echo $query1;

			//run query 
			$return = mysqli_query($con, $query1); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
                echo "<script> alert('New OP Visit Record Added')</script>";
                
                //create  select query
                $query2= "SELECT op_visit_id FROM ak_op_visit WHERE person_id='". $_POST["person_id"]."' and visit_date='". $_POST["visit_date"]."'";
                
               // echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $op_visit_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $op_visit_id=$record[0];
                }
               
                {       
                    $query5= "INSERT INTO ak_op_medicine_prescription (person_id, op_case_sheet_id, op_visit_id, visit_date, schedule, user_id, medicine_names) VALUES ('". $_POST["person_id"]."', '". $_POST["op_case_sheet_id"]."', '". $op_visit_id ."', '". $_POST["visit_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["medicine_prescriptions"] ."')";
                    
                     //echo $query5 . "<br>";
                    //run query 
                    $return = mysqli_query($con, $query5); 

                    //check fired query output
                    if (mysqli_affected_rows($con))
                    {		
                        echo "<script> alert('New Medicine Prescription Added')</script>";
                    }
                    else	
                        echo "<script> alert('New Medicine Prescription Not Added')</script>";
                }
                
                
                {
                   $query= "INSERT INTO ak_op_lifestyle_prescription (person_id, op_case_sheet_id, op_visit_id, visit_date, schedule, user_id, life_style_instructions) VALUES ('". $_POST["person_id"]."', '". $_POST["op_case_sheet_id"]."', '". $op_visit_id ."', '". $_POST["visit_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["life_style_prescriptions"] ."')";
                    
                    //echo $query;
                    //run query 
                    $return = mysqli_query($con, $query); 

                    //check fired query output
                    if (mysqli_affected_rows($con))
                    {		
                        echo "<script> alert('New LS Instructions Added')</script>";
                    }
                    else	
                        echo "<script> alert('New LS Instructions Not Added')</script>";
                }
                
			}
			else	
				echo "<script> alert('New OP Visit Record Not Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}

    echo "<script> window.open('../reports/print/Op_medicine_prescription_print.php?vsid=" . $op_visit_id ."' ,'_blank'); </script>";

    echo "<script> window.open('../reports/print/Op_ls_prescription_print.php?vsid=" . $op_visit_id ."' ,'_blank'); </script>";

	echo "<script> location.replace('../op_visit.php'); </script>";

?>