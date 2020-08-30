<?php
    // first of all, we must know from submit-form, how many values have come. for that, we shall use a php function called "sizeof", and we shall keep that value in a variable named $size.

    $size= sizeof($_POST);
    //echo $size;
    $records=$size/4;

    for ($i=1; $i<=$records; $i++)
    {
        $index1="disease_nick_id".$i;
        $disease_nick_id[$i]=$_POST[$index1];
        $index2="disease_category".$i;
        $disease_category[$i]=$_POST[$index2];
        $index3="disease_name".$i;
        $disease_name[$i]=$_POST[$index3];
        $index4="disease_nick".$i;
        $disease_nick[$i]=$_POST[$index4];
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
            $query= "UPDATE ak_disease_nick SET disease_category='$disease_category[$i]', disease_name='$disease_name[$i]', disease_nick='$disease_nick[$i]' where disease_nick_id=$disease_nick_id[$i]";
            
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

	echo "<script> location.replace('../disease_nick_up.php'); </script>";
        
    mysqli_close($con);
?>
