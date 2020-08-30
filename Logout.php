<?php
	//create connection
	include_once('./ak_com/database/Config.php');
    
	/* for session */
	if(session_id() == '') 
		session_start();
	/* for session */

    $data = new myConfig();

	$con = mysqli_connect($data->host,$data->user,$data->password,$data->db);
	//confirm connection
	if ($con)
	{
		mysqli_set_charset( $con, 'utf8' );
        
        session_destroy();
        unset($_SESSION['user_photo']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_id']);
        unset($_SESSION['role']);
        session_unset();
        //print_r($_SESSION);
        header("location:index.php");
		
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
	}
    mysqli_close($con);

?>

<!--
	if(session_id() == '') 
		session_start();

    if (isset($_SESSION['role'])) {
        session_destroy();
        unset($_SESSION['role']);
        header("location:index.php");
    }

session_destroy();
        unset($_SESSION['user_photo']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_id']);
        unset($_SESSION['role']);
    session_unset();
        header("location:index.php");
    exit();
     die();-->