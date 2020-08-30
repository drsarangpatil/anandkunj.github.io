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
            $query="UPDATE ak_rt_room_allocation SET person_id='". $_POST["person_id"]."', rt_case_sheet_id='". $_POST["rt_case_sheet_id"]."', user_id='". $_POST["user_id"]."', doa='". $_POST["doa"]."', retreat_name = '". $_POST["retreat_name"]."', retreat_duration='". $_POST["retreat_duration"]."', doc= '". $_POST["doc"]."', p_type= '". $_POST["p_type"]."', building_name = '". $_POST["building_name"]."', room_number= '". $_POST["room_numbera"]."', bed_number='". $_POST["bed_number"]."', room_status='". $_POST["room_status"]."', no_attendant= '". $_POST["no_attendant"]."', attendant_name1= '". $_POST["attendant_name1"]."', bed_number1= '". $_POST["bed_number1"]."', attendant_name2= '". $_POST["attendant_name2"]."', bed_number2= '". $_POST["bed_number2"]."' WHERE rt_room_allocation_id='" . $_POST["rt_room_allocation_id"] ."'";
              
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Room Updated')</script>";
			}
			else	
				echo "<script> alert('Room Not Updated')</script>";
            
                
                $query1= "UPDATE ak_room_number SET room_status='". $_POST["room_status"]."' WHERE room_number='" . $_POST['room_numbera'] ."'";

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
            
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}

    echo "<script> window.open('../reports/print/Rt_file_label_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

    echo "<script> window.open('../reports/print/Rt_participant_i_card_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

    echo "<script> window.open('../reports/print/Rt_attendant1_i_card_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

    echo "<script> window.open('../reports/print/Rt_attendant2_i_card_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

	echo "<script> location.replace('../rt_room_allocation_up.php'); </script>";

?>