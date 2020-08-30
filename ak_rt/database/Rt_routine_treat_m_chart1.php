<?php
    // first of all, we must know from submit-form, how many values have come. for that, we shall use a php function called "sizeof", and we shall keep that value in a variable named $size.

    
    $size= sizeof($_POST);
   // echo $size;
    $records=$size/9;
    for ($i=1; $i<=$records; $i++)
    {
        $index1="person_id".$i;
        $person_id[$i]=$_POST[$index1];
        $index2="rt_case_sheet_id".$i;
        $rt_case_sheet_id[$i]=$_POST[$index2];
        $index3="rt_daily_health_record_id".$i;
        $rt_daily_health_record_id[$i]=$_POST[$index3];
        $index4="daily_date".$i;
        $daily_date[$i]=$_POST[$index4];
        $index5="schedule".$i;
        $schedule[$i]=$_POST[$index5];
        $index6="user_id".$i;
        $user_id[$i]=$_POST[$index6];
        $index7="treatment_name".$i;
        $treatment_name[$i]=$_POST[$index7];
        $index8="therapy_dept".$i;
        $therapy_dept[$i]=$_POST[$index8];
        $index9="treatment_time".$i;
        $treatment_time[$i]=$_POST[$index9];
        $index10="therapist_name".$i;
        $therapist_name[$i]=$_POST[$index10];
        $index11="treat_instructions".$i;
        $treat_instructions[$i]=$_POST[$index11];
    }

    //create connection
    include_once('../database/Config.php');
    $data = new myConfig();
	$con = mysqli_connect($data->host, $data->user,$data->password,$data->db);

    if ($con)
	{
		mysqli_set_charset( $con, 'utf8' );
		
		//create query
        for ($i=1; $i<=$records; $i++)
        {
            
             $query= "INSERT INTO ak_rt_daily_treatment_prescription (person_id, rt_case_sheet_id daily_date, schedule, user_id, treatment_name, therapy_dept, treatment_time, therapist_name, treat_instructions) VALUES ('". $person_id[$i] ."', '". $rt_case_sheet_id[$i]."', '". $daily_date[$i]."', '". $schedule[$i]."', '". $user_id[$i]."', '". $treatment_name[$i] ."', '". $therapy_dept[$i] ."', '". $treatment_time[$i] ."', '". $therapist_name[$i] ."', '". $treat_instructions[$i] ."')"; 
            
            echo $query;
            //run query
            $return = mysqli_query($con, $query);
		    //check fired query output
         }
			/*if (mysqli_affected_rows($con))
			{*/		
				echo "<script> alert('Record Inserted')</script>";
			/*}
        
			else	
				echo "<script> alert('Not Added')</script>";*/
        
		}
	
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}

	//echo "<script> location.replace('../rt_routine_treat_m_chart.php'); </script>";
        
    mysqli_close($con);
?>
