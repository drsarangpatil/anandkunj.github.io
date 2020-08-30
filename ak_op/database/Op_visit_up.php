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
           $query1= "UPDATE ak_op_visit SET visit_date='". $_POST["visit_date"]."', schedule='". $_POST["schedule"]."', user_id='". $_POST["user_id"]."', complaints='". $_POST["complaints"]."', weight='". $_POST["weight"]."', bp='". $_POST["bp"]."', oe='". $_POST["oe"]."' WHERE op_visit_id='" . $_POST["op_visit_id"] ."'";
           
			//echo $query1 . "<br>";
			//run query 
			$return = mysqli_query($con, $query1); 
        }

			//check fired query output
			//if (mysqli_affected_rows($con))
			{		
                echo "<script> alert('OP Visit Updated')</script>";
                
                                
                $query1="DELETE FROM ak_op_medicine_prescription WHERE op_visit_id='". $_POST["op_visit_id"] ."'";
                
                $return = mysqli_query($con, $query1); 
 
                {
                  $query2= "INSERT INTO ak_op_medicine_prescription (person_id, op_case_sheet_id, op_visit_id, visit_date, schedule, user_id, medicine_names) VALUES ('". $_POST["person_id"]."', '". $_POST["op_case_sheet_id"]."', '". $_POST["op_visit_id"] ."', '". $_POST["visit_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["medicine_prescriptions"] ."')";

                   // echo $query2;
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
                
                $query1="DELETE FROM ak_op_lifestyle_prescription WHERE op_visit_id='". $_POST["op_visit_id"] ."'";
                
                $return = mysqli_query($con, $query1);

                //echo $query1 . "<br>";  

                {
                   $query= "INSERT INTO ak_op_lifestyle_prescription (person_id, op_case_sheet_id, op_visit_id, visit_date, schedule, user_id, life_style_instructions) VALUES ('". $_POST["person_id"]."', '". $_POST["op_case_sheet_id"]."', '". $_POST["op_visit_id"] ."', '". $_POST["visit_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["life_style_prescriptions"] ."')";
                    
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

    echo "<script> window.open('../reports/print/Op_medicine_prescription_print.php?vsid=" . $_POST["op_visit_id"] ."' ,'_blank'); </script>";

    echo "<script> window.open('../reports/print/Op_ls_prescription_print.php?vsid=" . $_POST["op_visit_id"] ."' ,'_blank'); </script>";

	echo "<script> location.replace('../op_visit_up.php'); </script>";

?>