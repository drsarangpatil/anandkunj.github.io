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
			//create  UPDATE query
           $query1= "UPDATE ak_rt_case_sheet SET doa='". $_POST["doa"]."', retreat_name='". $_POST["retreat_name"]."', ad_status='". $_POST["ad_status"]."', retreat_duration='". $_POST["retreat_duration"]."', doc='". $_POST["doc"]."', user_id='". $_POST["user_id"]."', present_complaints='". $_POST["present_complaints"]."', past_history='". $_POST["past_history"]."', treatment_history='". $_POST["treatment_history"]."', family_history='". $_POST["family_history"]."', appetite='". $_POST["appetite"]."', bowel_motions='". $_POST["bowel_motions"]."', urination='". $_POST["urination"]."', sleep='". $_POST["sleep"]."', food_habits='". $_POST["food_habits"]."', addictions='". $_POST["addictions"]."', work_type='". $_POST["work_type"]."', stress_type='". $_POST["stress_type"]."', clinical_examination='". $_POST["clinical_examination"]."', weight='". $_POST["weight"]."', height='". $_POST["height"]."', bmi='". $_POST["bmi"]."', investigations='". $_POST["investigations"]."' WHERE rt_case_sheet_id='" . $_POST["rt_case_sheet_id"] ."'";
           
			//echo $query1 . "<br>";

			//run query 
			$return = mysqli_query($con, $query1); 
        }

			//check fired query output
			//if (mysqli_affected_rows($con))
			{		
                echo "<script> alert('Record Updated to Case Sheet')</script>";
                
                                
                $query2="DELETE FROM ak_rt_case_sheet_fd WHERE rt_case_sheet_id='". $_POST["rt_case_sheet_id"] ."'" ;
                
                $return = mysqli_query($con, $query2); 
                
                //echo $query2 . "<br>";
                
                $lines = explode("\n",$_POST["final_diagnosis"]); // explode the fetched lines
                
                for($i = 0; $i < count($lines); $i++)
                {
                    $exploded_data=explode("~~",$lines[$i]); // further explode the exploded lines

                    $exploded_data[1] = str_replace("\n",'', $exploded_data[1]);
                    $exploded_data[1] = str_replace("\r",'', $exploded_data[1]);

                    $query3= "INSERT INTO ak_rt_case_sheet_fd (person_id, rt_case_sheet_id, user_id, disease_name, disease_nick) VALUES ('". $_POST["person_id"]."', '". $_POST["rt_case_sheet_id"] ."', '". $_POST["user_id"]."', '". $exploded_data[0] ."', '". $exploded_data[1] ."')";

                    //echo $query3 . "<br>";

                    //run query 
                    $return = mysqli_query($con, $query3); 

                    //check fired query output
                    if (mysqli_affected_rows($con))
                    {		
                        echo "<script> alert('Record Updated to Final Diagnosis')</script>";
                    }
                    else	
                        echo "<script> alert('Not Updated to Final Diagnosis')</script>";
                }
			}
			//else	
				//echo "<script> alert('Not Added to Case Sheet')</script>";
		}
	
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}

    echo "<script> window.open('../reports/print/Rt_case_sheet_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

    echo "<script> window.open('../reports/print/Rt_consent_sheet_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

    echo "<script> window.open('../reports/print/Rt_illness_certificate_print.php?csid=" . $_POST["rt_case_sheet_id"] ."' ,'_blank'); </script>";

	echo "<script> location.replace('../rt_case_sheet_up.php'); </script>";

?>