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
            echo $_POST["staff_other_info_id"];
            $query="";
            if($_POST["staff_other_info_id"] !=="")
            {
                //create query
               $query= "UPDATE ak_staff_other_info SET other_info_date= '". $_POST["other_info_date"]."',
               user_id='". $_POST["user_id"]."', staff_short_name='". $_POST["staff_short_name"]."', mother_tongue='". $_POST["mother_tongue"]."', religion='". $_POST["religion"]."', guardian_name='". $_POST["guardian_name"]."', guardian_relation='". $_POST["guardian_relation"]."', guardian_mobile_no='". $_POST["guardian_mobile_no"]."', adhar_no='". $_POST["adhar_no"]."', pan_no='". $_POST["pan_no"]."', referred_by='". $_POST["referred_by"]."', referrer_m_no='". $_POST["referrer_m_no"]."', past_work_exp='". $_POST["past_work_exp"]."', qualifcation1='". $_POST["qualifcation1"]."', institute1='". $_POST["institute1"]."', grade1='". $_POST["grade1"]."', qualifcation2='". $_POST["qualifcation2"]."', institute2='". $_POST["institute2"]."', grade2='". $_POST["grade2"]."', doj='". $_POST["doj"]."', name_of_dept='". $_POST["name_of_dept"]."', designation='". $_POST["designation"]."', role='". $_POST["role"]."', specialization='". $_POST["specialization"]."', working_type='". $_POST["working_type"]."', bank_name='". $_POST["bank_name"]."', ifsc_code='". $_POST["ifsc_code"]."', account_no='". $_POST["account_no"]."' WHERE staff_other_info_id=" . $_POST["staff_other_info_id"];
                
             }
            else
            {
                //create query
               $query= "INSERT INTO ak_staff_other_info (person_id, other_info_date, user_id, staff_short_name, mother_tongue, religion, guardian_name, guardian_relation, guardian_mobile_no, adhar_no, pan_no, referred_by, referrer_m_no, past_work_exp, qualifcation1, institute1, grade1, qualifcation2, institute2, grade2, doj, name_of_dept, designation, role, specialization, working_type, bank_name, ifsc_code, account_no) VALUES ('". $_POST["person_id"]."', '". $_POST["other_info_date"]."', '". $_POST["user_id"]."', '". $_POST["staff_short_name"]."', '". $_POST["mother_tongue"]."', '". $_POST["religion"]."', '". $_POST["guardian_name"]."', '". $_POST["guardian_relation"]."', '". $_POST["guardian_mobile_no"]."', '". $_POST["adhar_no"]."', '". $_POST["pan_no"]."', '". $_POST["referred_by"]."', '". $_POST["referrer_m_no"]."', '". $_POST["past_work_exp"]."', '". $_POST["qualifcation1"]."', '". $_POST["institute1"]."', '". $_POST["grade1"]."', '". $_POST["qualifcation2"]."', '". $_POST["institute2"]."', '". $_POST["grade2"]."', '". $_POST["doj"]."', '". $_POST["name_of_dept"]."', '". $_POST["designation"]."', '". $_POST["role"]."', '". $_POST["specialization"]."', '". $_POST["working_type"]."', '". $_POST["bank_name"]."', '". $_POST["ifsc_code"]."', '". $_POST["account_no"]."')";

            }
			
            //echo $query;

			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Record added')</script>";
			}
			else	
				echo "<script> alert('Not Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}


	echo "<script> location.replace('../staff_other_info.php'); </script>";

?>