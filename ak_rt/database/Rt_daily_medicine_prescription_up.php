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
            $query1="DELETE FROM ak_rt_daily_medicine_prescription WHERE daily_date='". $_POST["daily_date"] ."'";

            $return = mysqli_query($con, $query1); 

           // echo $query1 . "<br>"; 

            {
                $query5= "INSERT INTO ak_rt_daily_medicine_prescription (person_id, rt_case_sheet_id,  daily_date, schedule, user_id, medicine_names) VALUES ('". $_POST["person_id"]."', '". $_POST["rt_case_sheet_id"]."', '". $_POST["daily_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["medicine_prescriptions"] ."')";

                // echo $query5 . "<br>";

                //run query 
                $return = mysqli_query($con, $query5); 

                //check fired query output
                if (mysqli_affected_rows($con))
                {		
                    echo "<script> alert('Medicines Updated')</script>";
                    
                }
                else	
                    echo "<script> alert('Medicines Not Updated')</script>";
            }
            
            //create  select query
            $query2= "SELECT rt_medicine_prescription_id FROM ak_rt_daily_medicine_prescription WHERE person_id='". $_POST["person_id"]."' and daily_date='". $_POST["daily_date"]."'";

            //echo $query2;

            //run query 
            $response = mysqli_query($con, $query2); 

            $rt_medicine_prescription_id=0;
            while($record = mysqli_fetch_array($response))
            {
                $rt_medicine_prescription_id=$record[0];
            }
                
        }
			
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}
   echo "<script> window.open('../reports/print/Rt_medicine_prescription_print.php?mdid=" . $_POST["rt_medicine_prescription_id"] ."' ,'_blank'); </script>";
	echo "<script> location.replace('../rt_daily_medicine_prescription_up.php'); </script>";

?>