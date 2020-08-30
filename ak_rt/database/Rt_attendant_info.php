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
            //echo $_POST["rt_attendant_info_id"];
            //create query
            if($_POST["rt_attendant_info_id"] !=="")
            {
                $query="UPDATE ak_rt_attendant_info SET person_id='". $_POST["person_id"]."', rt_case_sheet_id='". $_POST["rt_case_sheet_id"]."', user_id='". $_POST["user_id"]."', doa='". $_POST["doa"]."', retreat_name = '". $_POST["retreat_name"]."', retreat_duration='". $_POST["retreat_duration"]."', doc= '". $_POST["doc"]."', no_attendant= '". $_POST["no_attendant"]."', attendant_name1 = '". $_POST["attendant_name1"]."', mobile_no1='". $_POST["mobile_no1"]."', relation1='". $_POST["relation1"]."', attendant_name2='". $_POST["attendant_name2"]."', mobile_no2= '". $_POST["mobile_no2"]."', relation2= '". $_POST["relation2"]."' WHERE rt_attendant_info_id='" . $_POST["rt_attendant_info_id"] ."'";
                
            }
            else
            {
            
                $query= "INSERT INTO ak_rt_attendant_info (person_id, rt_case_sheet_id, user_id, doa, retreat_name, retreat_duration, doc, no_attendant, attendant_name1, mobile_no1, relation1, attendant_name2, mobile_no2, relation2) VALUES ( '". $_POST["person_id"]."', '". $_POST["rt_case_sheet_id"]."', '". $_POST["user_id"]."', '". $_POST["doa"]."', '". $_POST["retreat_name"]."', '". $_POST["retreat_duration"]."', '". $_POST["doc"]."', '". $_POST["no_attendant"]."', '". $_POST["attendant_name1"]."', '". $_POST["mobile_no1"]."', '". $_POST["relation1"]."', '". $_POST["attendant_name2"]."', '". $_POST["mobile_no2"]."', '". $_POST["relation2"]."')";
            }
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Attendent Info Added')</script>";
                
                //create  select query
                /*$query2= "SELECT rt_attendant_info_id FROM ak_rt_attendant_info WHERE person_id='". $_POST["person_id"]."' and rt_case_sheet_id='". $_POST["rt_case_sheet_id"]."'";
                
                //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $rt_attendant_info_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $rt_attendant_info_id=$record[0];
                }*/
                
			}
			else	
				echo "<script> alert('Attendent Info Not Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}

    
	echo "<script> location.replace('../rt_attendant_info.php'); </script>";

?>