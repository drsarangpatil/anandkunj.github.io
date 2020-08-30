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
		
		if($process === "getAssociation_names")
		{
			//echo "4";
			$query = ("SELECT mb_association_name_id, association_name FROM ak_mb_association_name");
			
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
			
		if($process === "getMembership_types")
		{
			$association_name=filter_input(INPUT_GET, 'association_name');
			//echo "9";
			$query = ("SELECT mb_membership_type_id, membership_type FROM ak_mb_membership_type WHERE association_name= '" . $association_name . "'");
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
         
        if($process === "getMembership_amount")
		{
			$association_name=filter_input(INPUT_GET, 'association_name');
			$membership_type=filter_input(INPUT_GET, 'membership_type');
			//echo "8";
			$query = ("SELECT membership_amount FROM ak_mb_membership_type where association_name = '" . $association_name . "' AND membership_type = '" . $membership_type . "'");
			
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
        
        if($process === "getMembership_type") // used in reports sorting
		{
			//$magazine_name=filter_input(INPUT_GET, 'magazine_name');
			//echo "9";
			$query = ("SELECT distinct membership_type FROM ak_mb_membership_type");
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
        
	}

?>