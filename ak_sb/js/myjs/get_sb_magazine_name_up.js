$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_sb_magazine_name_up.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getSb_magazine_name_records" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#all_sb_magazine_records").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
	   }
    );
		       

 function myshow()
        {
            var sb_magazine_name_id = $('#sb_magazine_name_id').val();
            
            //alert(sb_magazine_name_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_sb_magazine_name_up.php',
                    type: 'GET',							
                    data: { process: "getSelected_magazine_name_data", sb_magazine_name_id:sb_magazine_name_id },

                    success: function (data) 
                    {
                        var res = data.split("~~"); // to split the fetched data 
                        
                       //alert("Success : " + data); 
                        
                        $("#magazine_name").val(res[0]);
                        $("#sb_sms_template").val(res[1]);
                        
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           
        }
            
            
            
           
           
        
