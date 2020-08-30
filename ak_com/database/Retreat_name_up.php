<?php
    // first of all, we must know from submit-form, how many values have come. for that, we shall use a php function called "sizeof", and we shall keep that value in a variable named $size.

    $size= sizeof($_POST);
    //echo $size;
    $records=$size/2;

    for ($i=1; $i<=$records; $i++)
    {
        $index1="retreat_name_id".$i;
        $retreat_name_id[$i]=$_POST[$index1];
        $index2="retreat_name".$i;
        $retreat_name[$i]=$_POST[$index2];
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
            $query= "UPDATE ak_retreat_name SET retreat_name='$retreat_name[$i]' where retreat_name_id=$retreat_name_id[$i]";
            
            //run query
            $return = mysqli_query($con, $query);
		    //check fired query output
         }
			/*if (mysqli_affected_rows($con))
			{*/		
            echo "<script> alert('Record Updated')</script>";
			/*}
        
			else	
				echo "<script> alert('Not Added')</script>";*/
        
		}
	
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}

	echo "<script> location.replace('../retreat_name_up.php'); </script>";
        
    mysqli_close($con);
?>
