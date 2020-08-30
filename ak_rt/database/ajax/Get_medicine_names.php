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
		
		if($process === "getDisease_category")
		{
			//echo "4";
			$query = ("SELECT disease_category_id, disease_category FROM ak_disease_category");
			
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
        
		/*if($process === "getDisease_name")
		{
			$disease_category=filter_input(INPUT_GET, 'disease_category');
			//echo "9";
			$query = ("SELECT disease_name_id, disease_name FROM ak_disease_name WHERE disease_category = '" . $disease_category . "'");
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
		}*/
        
        if($process === "getMedicine_names")
		{
			$disease_category=filter_input(INPUT_GET, 'disease_category');
			//$disease_name=filter_input(INPUT_GET, 'disease_name');
			//echo "8";
			$query = ("SELECT medicine_names_id, medicine_names FROM ak_medicine_names WHERE disease_category = '" . $disease_category . "'");
			
			//echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "9";
				while($record = mysqli_fetch_array($response))
				{
                
                    $option  = $option . '<option>' . $record[1] . '</option>';
					
				}
 				echo $option;			// send data back to JS file
			}
		}
        
/*        if($process === "getDosage")
		{
			$disease_category=filter_input(INPUT_GET, 'disease_category');
			$disease_name=filter_input(INPUT_GET, 'disease_name');
            $medicine_names=filter_input(INPUT_GET, 'medicine_names');
			//echo "8";
			$query = ("SELECT medicine_names_id, dosage FROM ak_medicine_names WHERE disease_category = '" . $disease_category . "' AND disease_name = '" . $disease_name . "' AND medicine_names = '" . $medicine_names . "'");
			
			//echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "9";
				while($record = mysqli_fetch_array($response))
				{
                
                    $option  = $option . '<option>' . $record[1] . '</option>';
					
				}
 				echo $option;			// send data back to JS file
			}
		}*/
		
	}

?>