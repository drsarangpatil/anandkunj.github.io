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
		
		$option = '<option ></option>';     
        //echo "3";
		
		if($process === "getMagazine_names")
		{
			//echo "4";
			$query = ("SELECT sb_magazine_name_id, magazine_name FROM ak_sb_magazine_name");
			
			//echo $query; 
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "5";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $option . '<option>' . $record[1] . '</option>';
				}
				echo $option;			// send data back to JS file
			}
		}
			
		if($process === "getSubscription_types")
		{
			$magazine_name=filter_input(INPUT_GET, 'magazine_name');
			//echo "9";
			$query = ("SELECT sb_subscription_type_id, subscription_type FROM ak_sb_subscription_type WHERE magazine_name= '" . $magazine_name . "'");
			//echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "10";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $option . '<option>' . $record[1] . '</option>';
				}
				echo $option;			// send data back to JS file
			}
		}
         
        if($process === "getSubscription_amount")
		{
			$magazine_name=filter_input(INPUT_GET, 'magazine_name');
			$subscription_type=filter_input(INPUT_GET, 'subscription_type');
			//echo "8";
			$query = ("SELECT subscription_amount FROM ak_sb_subscription_type where magazine_name = '" . $magazine_name . "' AND subscription_type = '" . $subscription_type . "'");
			
			//echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "9";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0];
				}
 				echo $option;			// send data back to JS file
			}
		}
        
        if($process === "getSubscription_type") // used in reports sorting
		{
			//$magazine_name=filter_input(INPUT_GET, 'magazine_name');
			//echo "9";
			$query = ("SELECT distinct subscription_type FROM ak_sb_subscription_type");
			//echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "10";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $option . '<option>' . $record[0] . '</option>';
				}
				echo $option;			// send data back to JS file
			}
		}
        
        if($process === "getSb_magazine_records")
		{
			//$rt_case_sheet_id=filter_input(INPUT_GET, 'rt_case_sheet_id');
            
            $query = ("SELECT 	sb_magazine_name_id, magazine_name FROM ak_sb_magazine_name WHERE 1");
            
           //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        
                        $row= $row .'<td name=sb_subscription_type_id align="left">' . $record[0] . '</td>';
                        $row= $row .'<td name=magazine_name align="left">' . $record[1] . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			 }
		  }
        
        if($process === "getSb_subscription_type_records")
		{
			//$rt_case_sheet_id=filter_input(INPUT_GET, 'rt_case_sheet_id');
            
            $query = ("SELECT sb_subscription_type_id, magazine_name, subscription_type, subscription_amount FROM ak_sb_subscription_type WHERE 1");
            
           //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        
                        $row= $row .'<td name=sb_subscription_type_id align="left">' . $record[0] . '</td>';
                        $row= $row .'<td name=magazine_name align="left">' . $record[1] . '</td>';
                        $row= $row .'<td name=subscription_type align="left">' . $record[2] . '</td>';
                        $row= $row .'<td name=subscription_amount align="left">' . $record[3] . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			 }
		  }
        
	}

?>