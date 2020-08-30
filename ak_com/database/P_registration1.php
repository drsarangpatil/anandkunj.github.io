<?php
	//create connection
	include_once('Config.php');
    $data = new myConfig();

	$con = mysqli_connect($data->host, $data->user,$data->password,$data->db);
        
		
	//confirm connection
	if ($con)
	{
        mysqli_set_charset( $con, 'utf8' );

            move_uploaded_file($_FILES["photo"]["tmp_name"],"photos/" . $_FILES["photo"]["name"]);
            move_uploaded_file($_FILES["passport_doc"]["tmp_name"],"passport_doc/" . $_FILES["passport_doc"]["name"]);
        
            /*$name = $_POST['person_category'];
            
            //echo "You chose the following person_category(s): <br>";

            foreach ($name as $person_category)
            { 
                echo $person_category."<br />";
            }*/
        
            $person_category = implode(',', $_POST['person_category']);
            //$person_category = ($_POST['person_category']);
            echo $person_category;
		
		{
            //echo $_POST["person_id"];
            $query="";
            if($_POST["person_id"] !=="")
            {
                $query="UPDATE ak_p_registration SET dor='". $_POST["dor"]."', full_name='". $_POST["full_namea"]."', gender='". $_POST["gender"]."', dob='". $_POST["dob"]."', pob = '". $_POST["pob"]."', marital_status='". $_POST["marital_status"]."', male_child= '". $_POST["male_child"]."', female_child= '". $_POST["female_child"]."', occupation= '". $_POST["occupation"]."', occu_spl_fea='". $_POST["occu_spl_fea"]."', photo= '". $_FILES["photo"]["name"]."', address='". $_POST["address"]."', at_post='". $_POST["at_post"]."', pin_code= '". $_POST["pin_code"]."', nation_name= '". $_POST["nation_namea"]."', state_name= '". $_POST["state_namea"]."', district_name='". $_POST["district_namea"]."', tahsil_name='". $_POST["tahsil_namea"]."', passport_no='". $_POST["passport_no"]."', passport_doc= '". $_FILES["passport_doc"]["name"]."', residence_phone='". $_POST["residence_phone"]."', mobile_no= '". $_POST["mobile_no"]."', emergency_no= '". $_POST["emergency_no"]."', whatsapp_no= '". $_POST["whatsapp_no"]."', email='". $_POST["email"]."', reference='". $_POST["reference"]."', person_category= ''". $person_category ."', user_id= '". $_POST["user_id"]."' WHERE person_id='" . $_POST["person_id"] ."'";
                
                
            }
            else
            {
                //create query
                $query= "INSERT INTO ak_p_registration (dor, full_name,  gender, dob, pob, marital_status, male_child, female_child, occupation, occu_spl_fea, photo, address, at_post, pin_code, nation_name, state_name, district_name, tahsil_name, passport_no, passport_doc, residence_phone, mobile_no, emergency_no, whatsapp_no, email, reference, person_category, user_id) VALUES ( '". $_POST["dor"]."', '". $_POST["full_namea"]."', '". $_POST["gender"]."', '". $_POST["dob"]."', '". $_POST["pob"]."', '". $_POST["marital_status"]."', '". $_POST["male_child"]."', '". $_POST["female_child"]."', '". $_POST["occupation"]."', '". $_POST["occu_spl_fea"]."', '". $_FILES["photo"]["name"]."', '". $_POST["address"]."', '". $_POST["at_post"]."', '". $_POST["pin_code"]."', '". $_POST["nation_namea"]."', '". $_POST["state_namea"]."', '". $_POST["district_namea"]."', '". $_POST["tahsil_namea"]."', '". $_POST["passport_no"]."', '". $_FILES["passport_doc"]["name"]."', '". $_POST["residence_phone"]."', '". $_POST["mobile_no"]."', '". $_POST["emergency_no"]."', '". $_POST["whatsapp_no"]."', '". $_POST["email"]."', '". $_POST["reference"]."',  '". $_POST["person_category"]."',  '". $_POST["user_id"]."')";
            }
			
            //echo $query;

			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Record Added')</script>";
			}
			else	
				echo "<script> alert('Not Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}


	//echo "<script> location.replace('../p_registration.php'); </script>";

?>