<?php
    // first of all, we must know from submit-form, how many values have come. for that, we shall use a php function called "sizeof", and we shall keep that value in a variable named $size.

    $size= sizeof($_POST);
    //echo $size;
    $records=$size/2;

    for ($i=1; $i<=$records; $i++)
    {
        $index1="disease_category_id".$i;
        $disease_category_id[$i]=$_POST[$index1];
        $index2="disease_category".$i;
        $disease_category[$i]=$_POST[$index2];
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
            $query= "UPDATE ak_disease_category SET disease_category ='$disease_category[$i]' where disease_category_id=$disease_category_id[$i]";
            
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

	echo "<script> location.replace('../disease_category_up.php'); </script>";
        
    mysqli_close($con);
?>
