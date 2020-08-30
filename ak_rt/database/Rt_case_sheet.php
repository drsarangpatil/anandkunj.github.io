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
           $query1= "INSERT INTO ak_rt_case_sheet (person_id, user_id, doa, retreat_name, ad_status, retreat_duration, doc, present_complaints, past_history, treatment_history, family_history, appetite, bowel_motions, urination, sleep, food_habits, addictions, work_type, stress_type, clinical_examination, weight, height, bmi, investigations) VALUES ('". $_POST["person_id"]."', '". $_POST["user_id"]."', '". $_POST["doa"]."', '". $_POST["retreat_name"]."', '". $_POST["ad_status"]."', '". $_POST["retreat_duration"]."', '". $_POST["doc"]."', '". $_POST["present_complaints"]."', '". $_POST["past_history"]."', '". $_POST["treatment_history"]."', '". $_POST["family_history"]."', '". $_POST["appetite"]."', '". $_POST["bowel_motions"]."', '". $_POST["urination"]."', '". $_POST["sleep"]."', '". $_POST["food_habits"]."', '". $_POST["addictions"]."', '". $_POST["work_type"]."', '". $_POST["stress_type"]."', '". $_POST["clinical_examination"]."',  '". $_POST["weight"]."',  '". $_POST["height"]."',  '". $_POST["bmi"]."', '". $_POST["investigations"]."')";
            
           
			//echo $query1;

			//run query 
			$return = mysqli_query($con, $query1); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
                echo "<script> alert('Record Added to Case Sheet')</script>";
                
                //create  select query
                $query2= "SELECT rt_case_sheet_id FROM ak_rt_case_sheet WHERE person_id='". $_POST["person_id"]."' and doa='". $_POST["doa"]."'";
                
                //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $rt_case_sheet_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $rt_case_sheet_id=$record[0];
                }
                
                $lines = explode("\n",$_POST["final_diagnosis"]); // explode the fetched lines
                for($i = 0; $i < count($lines); $i++)
                {
                    
                    $exploded_data=explode("~~",$lines[$i]); // further explode the exploded lines 
                   
                    
                    $exploded_data[1] = str_replace("\n",'', $exploded_data[1]);
                     $exploded_data[1] = str_replace("\r",'', $exploded_data[1]);
                    
                    //create insert query
                     $query3= "INSERT INTO ak_rt_case_sheet_fd (person_id, rt_case_sheet_id, user_id, disease_name, disease_nick) VALUES ('". $_POST["person_id"]."', '". $rt_case_sheet_id ."', '". $_POST["user_id"]."', '". $exploded_data[0] ."', '". $exploded_data[1] ."')";
                    
                     //echo $query3 . "<br>";

                    //run query 
                    $return = mysqli_query($con, $query3); 

                    //check fired query output
                    if (mysqli_affected_rows($con))
                    {		
                        echo "<script> alert('Record Added to Final Diagnosis')</script>";
                    }
                    else	
                        echo "<script> alert('Not Added to Final Diagnosis')</script>";
                }
			}
			else	
				echo "<script> alert('Not Added to Case Sheet')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}
    echo "<script> window.open('../reports/print/Rt_case_sheet_print.php?csid=" . $rt_case_sheet_id ."' ,'_blank'); </script>";

    echo "<script> window.open('../reports/print/Rt_consent_sheet_print.php?csid=" . $rt_case_sheet_id ."' ,'_blank'); </script>";

    echo "<script> window.open('../reports/print/Rt_illness_certificate_print.php?csid=" . $rt_case_sheet_id ."' ,'_blank'); </script>";

	echo "<script> location.replace('../rt_case_sheet.php'); </script>";

?>