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
            //echo $_POST["rt_gatepass_id"];
            //create query
            if($_POST["rt_gatepass_id"] !=="")
            {
                $query="UPDATE ak_rt_gatepass SET person_id='". $_POST["person_id"]."', rt_case_sheet_id='". $_POST["rt_case_sheet_id"]."', gatepass_date='". $_POST["gatepass_date"]."', schedule='". $_POST["schedule"]."', user_id='". $_POST["user_id"]."',  acc_d_clear = '". $_POST["acc_d_clear"]."', hk_d_clear='". $_POST["hk_d_clear"]."', shop_clear= '". $_POST["shop_clear"]."', sub_clear= '". $_POST["sub_clear"]."', mem_clear = '". $_POST["mem_clear"]."', lib_clear='". $_POST["lib_clear"]."', v_t_clear='". $_POST["v_t_clear"]."', off_clear='". $_POST["off_clear"]."' WHERE rt_gatepass_id='" . $_POST["rt_gatepass_id"] ."'";
             
            }
            else
            {
            
                $query= "INSERT INTO ak_rt_gatepass (person_id, rt_case_sheet_id, gatepass_date, schedule, user_id, acc_d_clear, hk_d_clear, shop_clear, sub_clear, mem_clear, lib_clear, v_t_clear, off_clear) VALUES ('". $_POST["person_id"]."', '". $_POST["rt_case_sheet_id"]."', '". $_POST["gatepass_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["acc_d_clear"]."', '". $_POST["hk_d_clear"]."', '". $_POST["shop_clear"]."', '". $_POST["sub_clear"]."', '". $_POST["mem_clear"]."', '". $_POST["lib_clear"]."', '". $_POST["v_t_clear"]."', '". $_POST["off_clear"]."')";
            }
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('GatePass Cleared')</script>";
			}
			else	
				echo "<script> alert('GatePass Not Cleared')</script>";
            
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}

    echo "<script> window.open('../reports/print/Rt_gate_pass_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

	echo "<script> location.replace('../rt_gate_pass_clearance.php'); </script>";

?>