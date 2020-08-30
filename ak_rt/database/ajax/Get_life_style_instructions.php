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
		
		if($process === "getDisease_categorya")
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
        
			
		/*if($process === "getDisease_namea")
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
		}
        */
        	
		if($process === "getLanguage")
		{
			$disease_category=filter_input(INPUT_GET, 'disease_category');
            
			//echo "10";
			$query = ("SELECT DISTINCT language FROM ak_life_style_instructions WHERE disease_category = '" . $disease_category . "'");
			//echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "11";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $option . '<option>' . $record[0] . '</option>';
				}
				echo $option;			// send data back to JS file
			}
		}
        
        if($process === "getLife_style_instructions")
		{
			$disease_category=filter_input(INPUT_GET, 'disease_category');
            $language=filter_input(INPUT_GET, 'language');
            
			//echo "12";
			$query = ("SELECT life_style_instructions_id, life_style_instructions FROM ak_life_style_instructions WHERE disease_category = '" . $disease_category . "' AND language = '" . $language . "'");
			
			//echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "13";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $option . '<option>' . $record[1] . '</option>';
				}
 				echo $option;			// send data back to JS file
			}
		}
		
	}

?>