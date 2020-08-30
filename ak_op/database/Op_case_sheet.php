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
           $query1= "INSERT INTO ak_op_case_sheet (person_id, case_paper_date, schedule, user_id, present_complaints, past_history, clinical_history, final_diagnosis) VALUES ('". $_POST["person_id"]."', '". $_POST["case_paper_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["present_complaints"]."', '". $_POST["past_history"]."', '". $_POST["clinical_history"]."', '". $_POST["final_diagnosis"]."')";
            
           
			//echo $query1;

			//run query 
			$return = mysqli_query($con, $query1); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
                echo "<script> alert('New Case Sheet Added')</script>";
                
                //create  select query
                $query2= "SELECT op_case_sheet_id FROM ak_op_case_sheet WHERE person_id='". $_POST["person_id"]."' and case_paper_date='". $_POST["case_paper_date"]."'";
                
                //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $op_case_sheet_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $op_case_sheet_id=$record[0];
                }
                
                /*$lines = explode("\n",$_POST["final_diagnosis"]); // explode the fetched lines
                for($i = 0; $i < count($lines); $i++)
                {
                    
                    $exploded_data=explode(",",$lines[$i]); // further explode the exploded lines 
                    
                    $exploded_data[1] = str_replace("\n",'', $exploded_data[1]);
                     $exploded_data[1] = str_replace("\r",'', $exploded_data[1]);
                    
                    //create insert query
                     $query3= "INSERT INTO ak_op_case_sheet_fd (person_id, op_case_sheet_id, user_id, disease_name, disease_nick) VALUES ('". $_POST["person_id"]."', '". $op_case_sheet_id ."', '". $_POST["user_id"]."', '". $exploded_data[0] ."', '". $exploded_data[1] ."')";
                    
                     //echo $query3 . "<br>";

                    //run query 
                    $return = mysqli_query($con, $query3); 

                    //check fired query output
                    if (mysqli_affected_rows($con))
                    {		
                        echo "<script> alert('New Final Diagnosis')</script>";
                    }
                    else	
                        echo "<script> alert('New Final Diagnosis')</script>";
                }*/
			}
			else	
				echo "<script> alert('No Case Sheet Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}

    echo "<script> window.open('../reports/print/Op_case_sheet_print.php?csid=" . $op_case_sheet_id ."' ,'_blank'); </script>";

	echo "<script> location.replace('../op_case_sheet.php'); </script>";

?>