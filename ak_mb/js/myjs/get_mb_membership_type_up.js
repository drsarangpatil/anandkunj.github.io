$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_mb_membership_type_up.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getMb_membership_type_records" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#all_membership_type_records").html(data);					// to set fetched data
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
            var mb_membership_type_id = $('#mb_membership_type_id').val();
            
            //alert(mb_membership_type_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_mb_membership_type_up.php',
                    type: 'GET',							
                    data: { process: "getSelected_membership_type_data", mb_membership_type_id:mb_membership_type_id },

                    success: function (data) 
                    {
                        var res = data.split("~~"); // to split the fetched data 
                        
                       //alert("Success : " + data); 
                        
                        $("#association_name").val(res[0]);
                        $("#membership_type").val(res[1]);
                        $("#membership_amount").val(res[2]);
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           
        }
            
            
            
           
           
        
