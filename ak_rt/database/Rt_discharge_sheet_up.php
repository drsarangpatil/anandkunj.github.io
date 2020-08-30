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
            $query1="DELETE FROM ak_rt_discharge_sheet WHERE ak_rt_discharge_sheet_id='". $_POST["ak_rt_discharge_sheet_id"] ."'";

            $return = mysqli_query($con, $query1); 

            //echo $query1 . "<br>";
            
            $query= "INSERT INTO ak_rt_discharge_sheet (person_id, rt_case_sheet_id, discharge_date, schedule, user_id, ad_status) VALUES ('". $_POST["person_id"]."', '". $_POST["rt_case_sheet_id"]."', '". $_POST["discharge_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["ad_status"]."')";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Discharge Updated')</script>";
			}
			else	
				echo "<script> alert('Discharge Not Updated')</script>";
            
        
			//create  insert query
           $query1= "UPDATE ak_rt_case_sheet SET doa='". $_POST["doa"]."', retreat_name='". $_POST["retreat_name"]."', ad_status='". $_POST["ad_status"]."', retreat_duration='". $_POST["retreat_duration"]."', doc='". $_POST["doc"]."', user_id='". $_POST["user_id"]."' WHERE rt_case_sheet_id='" . $_POST["rt_case_sheet_id"] ."'";
           
			//echo $query1 . "<br>";

			//run query 
			$return = mysqli_query($con, $query1);
			//check fired query output
        
			if (mysqli_affected_rows($con))
			{		
                
                echo "<script> alert('Record Updated to Discharge Status')</script>";
                
			}
			else	
				echo "<script> alert('Not Updated to Discharge Status')</script>";
        
        
            $query1= "UPDATE ak_room_number SET room_status='". $_POST["room_status"]."' WHERE room_number='" . $_POST["room_number"] ."'";

            //echo $query1;
            //run query 
            $return = mysqli_query($con, $query1); 

            //check fired query output
            if (mysqli_affected_rows($con))
            {		
                echo "<script> alert('Room Status Updated')</script>";
            }
            else	
                echo "<script> alert('Room Status  Not Updated')</script>";
        
        
            $query1= "UPDATE ak_rt_room_allocation SET room_status='". $_POST["room_status"]."' WHERE room_number='" . $_POST["room_number"] ."'";

            //echo $query1;
            //run query 
            $return = mysqli_query($con, $query1); 

            //check fired query output
            if (mysqli_affected_rows($con))
            {		
                echo "<script> alert('Room Allocation Updated')</script>";
            }
            else	
                echo "<script> alert('Room Allocation  Not Updated')</script>";
            
        }

        
    }
	
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}

    echo "<script> window.open('../reports/print/Rt_discharge_sheet_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

    echo "<script> window.open('../reports/print/Rt_fitness_certificate_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

    echo "<script> window.open('../reports/print/Rt_participation_certificate_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

    echo "<script> window.open('../reports/print/Rt_testimonial_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

     echo "<script> window.open('../reports/print/Rt_feedback_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

	echo "<script> location.replace('../rt_discharge_sheet_up.php'); </script>";

?>