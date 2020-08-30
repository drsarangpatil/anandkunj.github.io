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
           $query1= "UPDATE ak_op_case_sheet SET case_paper_date='". $_POST["case_paper_date"]."', schedule='". $_POST["schedule"]."', user_id='". $_POST["user_id"]."', present_complaints='". $_POST["present_complaints"]."', past_history='". $_POST["past_history"]."', clinical_history='". $_POST["clinical_history"]."', final_diagnosis='". $_POST["final_diagnosis"]."' WHERE op_case_sheet_id='" . $_POST["op_case_sheet_id"] ."'";
           
			//echo $query1 . "<br>";

			//run query 
			$return = mysqli_query($con, $query1); 
        }

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
                echo "<script> alert('OP-Case-Sheet Updated')</script>";
                
                                
               /* $query2="DELETE FROM ak_op_case_sheet_fd WHERE op_case_sheet_id='". $_POST["op_case_sheet_id"] ."'" ;
                
                $return = mysqli_query($con, $query2); 
                
                //echo $query2 . "<br>";
                
                $lines = explode("\n",$_POST["final_diagnosis"]); // explode the fetched lines
                
                for($i = 0; $i < count($lines); $i++)
                {
                    $exploded_data=explode("~~",$lines[$i]); // further explode the exploded lines

                    $exploded_data[1] = str_replace("\n",'', $exploded_data[1]);
                    $exploded_data[1] = str_replace("\r",'', $exploded_data[1]);

                    $query3= "INSERT INTO ak_op_case_sheet_fd (person_id, op_case_sheet_id, user_id, disease_name, disease_nick) VALUES ('". $_POST["person_id"]."', '". $_POST["op_case_sheet_id"] ."', '". $_POST["user_id"]."', '". $exploded_data[0] ."', '". $exploded_data[1] ."')";

                    //echo $query3 . "<br>";

                    //run query 
                    $return = mysqli_query($con, $query3); 

                    //check fired query output
                    if (mysqli_affected_rows($con))
                    {		
                        echo "<script> alert('Final Diagnosis Updated')</script>";
                    }
                    else	
                        echo "<script> alert('Final Diagnosis Not Updated')</script>";
                }*/
			}
			else	
				echo "<script> alert('Not Updated to Case Sheet')</script>";
		}
	
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}
    echo "<script> window.open('../reports/print/Op_case_sheet_print.php?csid=" . $_POST["op_case_sheet_id"] ."' ,'_blank'); </script>";

	echo "<script> location.replace('../op_case_sheet_up.php'); </script>";
    

?>