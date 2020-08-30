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
        /*move_uploaded_file($_FILES["passport_doc"]["tmp_name"],"passport_doc/" . $_FILES["passport_doc"]["name"]);
            echo $_POST['person_category'];
            echo $_POST['patient'];
            echo $_POST['student'];
            echo $_POST['employee'];
            echo $_POST['subscriber'];
            echo $_POST['member'];
            echo $_POST['donner'];*/
        
        $par="-";
        if(isset($_POST["participant"]))
             $par = $_POST['participant'];
        
        $pat="-";
        if(isset($_POST["patient"]))
             $pat = $_POST['patient'];
        
        $stu="-";
        if(isset($_POST["student"]))
             $stu = $_POST['student'];
        
        $emp="-";
        if(isset($_POST["employee"]))
             $emp = $_POST['employee'];
        
        $sub="-";
        if(isset($_POST["subscriber"]))
             $sub = $_POST['subscriber'];
        
        $mem="-";
        if(isset($_POST["member"]))
             $mem = $_POST['member'];
        
        $don="-";
        if(isset($_POST["donner"]))
             $don = $_POST['donner'];
        
        
        $b = implode(', ', $_POST['cp']);
        
            echo $b;
        
            $query="";
        /*if( isset($_POST["person_id"] ) and isset($_POST["passport_doc"]))
            {
                $query="UPDATE ak_p_registration SET passport_doc= '". $_FILES["passport_doc"]["name"]."' WHERE person_id='" . $_POST["person_id"] ."'";
            //echo $query;
			$return = mysqli_query($con, $query);
            }
            
        
        if( isset($_POST["person_id"] ) and isset($_POST["passport_no"]))
            {
                $query="UPDATE ak_p_registration SET passport_no= '". $_POST["passport_no"]."' WHERE person_id='" . $_POST["person_id"] ."'";
            //echo $query;
			$return = mysqli_query($con, $query);
            }*/
            
        
        $query="";
        if($_POST["person_id"] !=="" and isset($_POST["photo"]))
            {
                $query="UPDATE ak_p_registration SET photo= '". $_FILES["photo"]["name"]."' WHERE person_id='" . $_POST["person_id"] ."'";
            //echo $query;
			$return = mysqli_query($con, $query);
            }
		
		{
            //echo $_POST["person_id"];
            
            if($_POST["person_id"] !=="")
            {
                $query="UPDATE ak_p_registration SET dor='". $_POST["dor"]."', full_name='". $_POST["full_namea"]."', gender='". $_POST["gender"]."', dob='". $_POST["dob"]."', pob = '". $_POST["pob"]."', marital_status='". $_POST["marital_status"]."', male_child= '". $_POST["male_child"]."', female_child= '". $_POST["female_child"]."', occupation= '". $_POST["occupation"]."', occu_spl_fea='". $_POST["occu_spl_fea"]."', address='". $_POST["address"]."', at_post='". $_POST["at_post"]."', pin_code= '". $_POST["pin_code"]."', nation_name= '". $_POST["nation_namea"]."', state_name= '". $_POST["state_namea"]."', district_name='". $_POST["district_namea"]."', tahsil_name='". $_POST["tahsil_namea"]."', residence_phone='". $_POST["residence_phone"]."', mobile_no= '". $_POST["mobile_no"]."', emergency_no= '". $_POST["emergency_no"]."', whatsapp_no= '". $_POST["whatsapp_no"]."', email='". $_POST["email"]."', reference='". $_POST["reference"]."', isparticipant= '". $par."', ispatient= '". $pat."', isstudent= '". $stu."', isemployee= '". $emp."', issubscriber= '". $sub."', ismember= '". $mem."', isdonner= '". $don."', cp= '". $b."', user_id= '". $_POST["user_id"]."' WHERE person_id='" . $_POST["person_id"] ."'";
            }
            else
            {
                //create query
                $query= "INSERT INTO ak_p_registration (dor, full_name,  gender, dob, pob, marital_status, male_child, female_child, occupation, occu_spl_fea, photo, address, at_post, pin_code, nation_name, state_name, district_name, tahsil_name, residence_phone, mobile_no, emergency_no, whatsapp_no, email, reference, isparticipant, ispatient, isstudent, isemployee, issubscriber, ismember, isdonner, cp, user_id) VALUES ( '". $_POST["dor"]."', '". $_POST["full_namea"]."', '". $_POST["gender"]."', '". $_POST["dob"]."', '". $_POST["pob"]."', '". $_POST["marital_status"]."', '". $_POST["male_child"]."', '". $_POST["female_child"]."', '". $_POST["occupation"]."', '". $_POST["occu_spl_fea"]."', '". $_FILES["photo"]["name"]."', '". $_POST["address"]."', '". $_POST["at_post"]."', '". $_POST["pin_code"]."', '". $_POST["nation_namea"]."', '". $_POST["state_namea"]."', '". $_POST["district_namea"]."', '". $_POST["tahsil_namea"]."', '". $_POST["residence_phone"]."', '". $_POST["mobile_no"]."', '". $_POST["emergency_no"]."', '". $_POST["whatsapp_no"]."', '". $_POST["email"]."', '". $_POST["reference"]."',  '". $par."', '". $pat."', '". $stu."', '". $emp."', '". $sub."', '". $mem."', '". $don."', '". $b."',  '". $_POST["user_id"]."')";
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