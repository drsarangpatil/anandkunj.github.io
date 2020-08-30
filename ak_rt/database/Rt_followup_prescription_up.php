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
			//create  update query
           $query1= "UPDATE ak_rt_followup SET followup_date='". $_POST["followup_date"]."', schedule='". $_POST["schedule"]."', user_id='". $_POST["user_id"]."', complaints='". $_POST["complaints"]."', weight='". $_POST["weight"]."', height='". $_POST["height"]."',  bmi='". $_POST["bmi"]."', bp='". $_POST["bp"]."', oe='". $_POST["oe"]."', investigations='". $_POST["investigations"]."' WHERE rt_followup_id='" . $_POST["rt_followup_id"] ."'";
            
			//echo $query1 . "<br>";
			//run query 
			$return = mysqli_query($con, $query1); 
        }

			//check fired query output
			//if (mysqli_affected_rows($con))
			{		
                echo "<script> alert('Followup Updated')</script>";
                
                                
                $query1="DELETE FROM ak_rt_followup_medicine WHERE rt_followup_id='". $_POST["rt_followup_id"] ."'";
                
                $return = mysqli_query($con, $query1); 

                //echo $query1 . "<br>";  
                {
                   $query2= "INSERT INTO ak_rt_followup_medicine (person_id, rt_case_sheet_id, rt_followup_id, followup_date, schedule, user_id, medicine_names) VALUES ('". $_POST["person_id"]."', '". $_POST["rt_case_sheet_id"]."', '". $_POST["rt_followup_id"]."', '". $_POST["followup_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["medicine_prescriptions"] ."')";

                    //echo $query2;
                    //run query 
                    $return = mysqli_query($con, $query2); 

                    //check fired query output
                    if (mysqli_affected_rows($con))
                    {		
                        echo "<script> alert('Medicines Updated')</script>";
                    }

                    else	
                        echo "<script> alert('Medicines Not Updated')</script>";
		        }
                
                $query1="DELETE FROM ak_rt_followup_lifestyle WHERE rt_followup_id='". $_POST["rt_followup_id"] ."'";
                
                $return = mysqli_query($con, $query1);

                //echo $query1 . "<br>";  

                {
                   $query= "INSERT INTO ak_rt_followup_lifestyle (person_id, rt_case_sheet_id, rt_followup_id, followup_date, schedule, user_id, life_style_instructions) VALUES ('". $_POST["person_id"]."', '". $_POST["rt_case_sheet_id"]."', '". $_POST["rt_followup_id"] ."', '". $_POST["followup_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["life_style_prescriptions"] ."')";
                    
                    //echo $query;

                    //run query 
                    $return = mysqli_query($con, $query); 

                    //check fired query output
                    if (mysqli_affected_rows($con))
                    {		
                        echo "<script> alert('Lifestyle Updated')</script>";
                    }
                    else	
                        echo "<script> alert('Lifestyle Not Updated')</script>";
                }  
                
			}
			//else	
				//echo "<script> alert('Not Added to Case Sheet')</script>";
		}
	
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}


    echo "<script> window.open('../reports/print/Rt_followup_med_prescription_print.php?fuid=" . $_POST["rt_followup_id"] ."' ,'_blank'); </script>";

     echo "<script> window.open('../reports/print/Rt_followup_ls_prescription_print.php?fuid=" . $_POST["rt_followup_id"] ."' ,'_blank'); </script>";

    echo "<script> window.open('../reports/print/Rt_testimonial_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

     echo "<script> window.open('../reports/print/Rt_feedback_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

	echo "<script> location.replace('../rt_followup_prescription_up.php'); </script>";

?>