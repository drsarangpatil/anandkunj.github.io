<?php
	//create connection
	include_once('Config.php');
    $data = new myConfig();

	$con = mysqli_connect($data->host, $data->user,$data->password,$data->db);
	//confirm connection
	if ($con)
	{
		mysqli_set_charset( $con, 'utf8' );
		
            //create query
           $query= "UPDATE ak_medicine_names SET disease_category= '". $_POST["disease_category"]."', medicine_names='". $_POST["medicine_names"]."' WHERE medicine_names_id='". $_POST["medicine_names_id"] ."'";
       
			//echo $query;

			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Record Updated')</script>";
			}
			else	
				echo "<script> alert('Not Updated')</script>";
		}
	
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}


	echo "<script> location.replace('../medicine_names_up.php'); </script>";

?>