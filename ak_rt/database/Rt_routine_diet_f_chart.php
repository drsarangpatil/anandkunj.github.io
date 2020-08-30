<?php
    // first of all, we must know from submit-form, how many values have come. for that, we shall use a php function called "sizeof", and we shall keep that value in a variable named $size.

    
    $size=sizeof($_POST);
    $records=$size/10;   //here 3 is number of column in the HTML table
    for($i=1;$i<=$records;$i++)

    {
        $index1="person_id".$i;
        $person_id[$i]=$_POST[$index1];
        $index2="rt_case_sheet_id".$i;
        $rt_case_sheet_id[$i]=$_POST[$index2];
        $index4="daily_date".$i;
        $daily_date[$i]=$_POST[$index4];
        $index5="schedule".$i;
        $schedule[$i]=$_POST[$index5];
        $index6="user_id".$i;
        $user_id[$i]=$_POST[$index6];
        $index7="morning_diet".$i;
        $morning_diet[$i]=$_POST[$index7];
        $index8="noon_diet".$i;
        $noon_diet[$i]=$_POST[$index8];
        $index9="afternoon_diet".$i;
        $afternoon_diet[$i]=$_POST[$index9];
        $index10="evening_diet".$i;
        $evening_diet[$i]=$_POST[$index10];
        $index11="instruc".$i;
        $instruc[$i]=$_POST[$index11];
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
            
             $query= "INSERT INTO ak_rt_daily_diet_prescription (person_id, rt_case_sheet_id, daily_date, schedule, user_id, morning_diet, noon_diet, afternoon_diet, evening_diet, instruc) VALUES ('$person_id[$i]', '$rt_case_sheet_id[$i]', '$daily_date[$i]', '$schedule[$i]', '$user_id[$i]', '$morning_diet[$i]', ' $noon_diet[$i]', '$afternoon_diet[$i]', '$evening_diet[$i]', ' $instruc[$i]')"; 
            
            //echo $query;
            //run query
            $return = mysqli_query($con, $query);
		    //check fired query output
         }
			/*if (mysqli_affected_rows($con))
			{*/		
				echo "<script> alert('Group Diet Record Inserted')</script>";
			/*}
        
			else	
				echo "<script> alert('Not Added')</script>";*/
        
		}
	
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}

	echo "<script> location.replace('../rt_routine_diet_f_chart.php'); </script>";
        
    mysqli_close($con);
?>
