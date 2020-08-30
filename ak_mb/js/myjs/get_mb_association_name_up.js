$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_mb_association_name_up.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getMb_association_name_records" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#all_mb_association_records").html(data);					// to set fetched data
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
            var mb_association_name_id = $('#mb_association_name_id').val();
            
            //alert(mb_association_name_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_mb_association_name_up.php',
                    type: 'GET',							
                    data: { process: "getSelected_association_name_data", mb_association_name_id:mb_association_name_id },

                    success: function (data) 
                    {
                        var res = data.split("~~"); // to split the fetched data 
                        
                       //alert("Success : " + data); 
                        
                        $("#association_name").val(res[0]);
                        //$("#mb_association_name_id").val(res[1]);
                        
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           
        }
            
            
            
           
           
        
