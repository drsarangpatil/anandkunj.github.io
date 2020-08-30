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
           $query1= "UPDATE ak_direct_visit SET prescription_date='". $_POST["prescription_date"]."', schedule='". $_POST["schedule"]."', user_id='". $_POST["user_id"]."', age='". $_POST["age"]."', gender='". $_POST["gender"]."', mobile_no='". $_POST["mobile_no"]."', complaints='". $_POST["complaints"]."', weight='". $_POST["weight"]."', bp='". $_POST["bp"]."', oe='". $_POST["oe"]."', final_diagnosis='". $_POST["final_diagnosis"]."'  WHERE direct_visit_id='" . $_POST["direct_visit_id"] ."'";
            
			//echo $query1;
           
			//run query 
			$return = mysqli_query($con, $query1); 
        }

			//check fired query output
			//if (mysqli_affected_rows($con))
			{		
                echo "<script> alert('Visit Record Updated')</script>";
                
                //create  select query
                 $query2="DELETE FROM ak_dir_medicine_prescription WHERE direct_visit_id='". $_POST["direct_visit_id"] ."'" ;
                
                $return = mysqli_query($con, $query2); 
                
                //echo $query2 . "<br>";
                
                {
                   $query5="INSERT INTO ak_dir_medicine_prescription (direct_visit_id, prescription_date, schedule, user_id, medicine_names) VALUES ( '". $_POST["direct_visit_id"] ."', '". $_POST["prescription_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["medicine_prescriptions"] ."')";
                    
                    
                    //echo $query5 . "<br>";

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
                
			}
			//else	
				//echo "<script> alert('Visit Record Not Added')</script>";
		}
	
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}
    
    echo "<script> window.open('../reports/print/Dir_medicine_prescription_print.php?vsid=". $_POST["direct_visit_id"] ."' ,'_blank'); </script>";

	echo "<script> location.replace('../dir_medicine_prescription_up.php'); </script>";

?>