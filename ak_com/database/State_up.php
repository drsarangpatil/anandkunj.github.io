<?php
    // first of all, we must know from submit-form, how many values have come. for that, we shall use a php function called "sizeof", and we shall keep that value in a variable named $size.

    $size= sizeof($_POST);
    //echo $size;
    $records=$size/3;

    for ($i=1; $i<=$records; $i++)
    {
        $index1="state_id".$i;
        $state_id[$i]=$_POST[$index1];
        $index2="nation_name".$i;
        $nation_name[$i]=$_POST[$index2];
        $index3="state_name".$i;
        $state_name[$i]=$_POST[$index3];
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
            $query= "UPDATE ak_states SET nation_name='$nation_name[$i]', state_name='$state_name[$i]' where state_id=$state_id[$i]";
            
            //run query
            $return = mysqli_query($con, $query);
		    //check fired query output
         }
			/*if (mysqli_affected_rows($con))
			{*/		
            echo "<script> alert('Record updated')</script>";
			/*}
        
			else	
				echo "<script> alert('Not Added')</script>";*/
        
		}
	
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}

	echo "<script> location.replace('../state_up.php'); </script>";
        
    mysqli_close($con);
?>
