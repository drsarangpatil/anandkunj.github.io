<?php
	//create connection
	include_once('../Config.php');
    $data = new myConfig();

	$con = mysqli_connect($data->host, $data->user,$data->password,$data->db);
	//confirm connection
	if ($con)
	{
		//echo "1";
		mysqli_set_charset( $con, 'utf8' );
		
		//create process
		$process = filter_input(INPUT_GET, 'process');
		//echo "2 : " . $process;
		
        $option = '';             
        //echo "3";
		
        if($process === "getMb_membership_type_records")
		{
			
            $query = ("SELECT mb_membership_type_id, association_name, membership_type, membership_amount FROM ak_mb_membership_type WHERE 1");
            
           //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=mb_membership_type_id align="left">' . $record[0] . '</td>';
                        $row= $row .'<td name=association_name align="left">' . $record[1] . '</td>';
                        $row= $row .'<td name=membership_type align="left">' . $record[2] . '</td>';
                        $row= $row .'<td name=membership_amount align="left">' . $record[3] . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			 }
		  }
        
        if($process === "getSelected_membership_type_data")
		{
			$mb_membership_type_id=filter_input(INPUT_GET, 'mb_membership_type_id');
            
			//echo "6";
            
			$query = ("SELECT association_name, membership_type, membership_amount FROM ak_mb_membership_type WHERE mb_membership_type_id = '" . $mb_membership_type_id . "'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2];
				}
				echo $option;			// send data back to JS file
			}
		}
        
	}

?>