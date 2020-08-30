<?php
    // first of all, we must know from submit-form, how many values have come. for that, we shall use a php function called "sizeof", and we shall keep that value in a variable named $size.

    $size= sizeof($_POST);
    //echo $size;
    $records=$size/5;

    for ($i=1; $i<=$records; $i++)
    {
        $index1="life_style_instructions_id".$i;
        $life_style_instructions_id[$i]=$_POST[$index1];
        $index2="disease_category".$i;
        $disease_category[$i]=$_POST[$index2];
        $index3="disease_name".$i;
        $disease_name[$i]=$_POST[$index3];
        $index4="language".$i;
        $language[$i]=$_POST[$index4];
        $index5="life_style_instructions".$i;
        $life_style_instructions[$i]=$_POST[$index5];
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
            $query= "UPDATE  ak_life_style_instructions SET disease_category='$disease_category[$i]', disease_name='$disease_name[$i]', language='$language[$i]', life_style_instructions='$life_style_instructions[$i]' where life_style_instructions_id=$life_style_instructions_id[$i]";
            
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

	echo "<script> location.replace('../life_style_instructions_up.php'); </script>";
        
    mysqli_close($con);
?>
