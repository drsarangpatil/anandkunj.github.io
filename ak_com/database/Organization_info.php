<?php
	//create connection
	include_once('Config.php');
    $data = new myConfig();

	$con = mysqli_connect($data->host, $data->user,$data->password,$data->db);
        
		
	//confirm connection
	if ($con)
	{
        mysqli_set_charset( $con, 'utf8' );

            move_uploaded_file($_FILES["logo"]["tmp_name"],"logos/" . $_FILES["logo"]["name"]);
        
		{
            //echo $_POST["org_id"];
            $query="";
            if($_POST["org_id"] !=="")
                
            {
                $query="UPDATE ak_organization_info SET doo='". $_POST["doo"]."', main_name='". $_POST["main_namea"]."', org_slogan='". $_POST["org_slogan"]."', parent_org='". $_POST["parent_org"]."', other_title = '". $_POST["other_title"]."', logo= '". $_FILES["logo"]["name"]."', address= '". $_POST["address"]."', at_post= '". $_POST["at_post"]."', pin_code='". $_POST["pin_code"]."', residence_phone1='". $_POST["residence_phone1"]."', residence_phone2='". $_POST["residence_phone2"]."', mobile_no= '". $_POST["mobile_no"]."', whatsapp_no= '". $_POST["whatsapp_no"]."', email= '". $_POST["email"]."', website='". $_POST["website"]."', bank_name='". $_POST["bank_name"]."', ifsc_code='". $_POST["ifsc_code"]."', account_no='". $_POST["account_no"]."', reg_autho= '". $_POST["reg_autho"]."', doi='". $_POST["doi"]."', org_reg_no= '". $_POST["org_reg_no"]."', gst_reg_no= '". $_POST["gst_reg_no"]."', user_id= '". $_POST["user_id"]."' WHERE org_id='" . $_POST["org_id"] ."'";
                
            }
            else
            {
                //create query
                $query= "INSERT INTO ak_organization_info (doo, main_name, org_slogan, parent_org, other_title, logo, address, at_post, pin_code, residence_phone1, residence_phone2, mobile_no, whatsapp_no, email, website, bank_name, ifsc_code, account_no, reg_autho, doi, org_reg_no, gst_reg_no, user_id) VALUES ( '". $_POST["doo"]."', '". $_POST["main_namea"]."', '". $_POST["org_slogan"]."', '". $_POST["parent_org"]."', '". $_POST["other_title"]."', '". $_FILES["logo"]["name"]."', '". $_POST["address"]."', '". $_POST["at_post"]."', '". $_POST["pin_code"]."', '". $_POST["residence_phone1"]."', '". $_POST["residence_phone2"]."', '". $_POST["mobile_no"]."', '". $_POST["whatsapp_no"]."', '". $_POST["email"]."', '". $_POST["website"]."', '". $_POST["bank_name"]."', '". $_POST["ifsc_code"]."', '". $_POST["account_no"]."', '". $_POST["reg_autho"]."', '". $_POST["doi"]."', '". $_POST["org_reg_no"]."',  '". $_POST["gst_reg_no"]."', '". $_POST["user_id"]."')";
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


	echo "<script> location.replace('../organization_info.php'); </script>";

?>