$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_medicine_names_up.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getMedicine_name_records" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#all_medicine_name_records").html(data);					// to set fetched data
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
        var medicine_names_id = $('#medicine_names_id').val();

        //alert(medicine_names_id);
        $.ajax
        (
            {
                url: 'database/ajax/Get_medicine_names_up.php',
                type: 'GET',							
                data: { process: "getSelected_medicine_name_data", medicine_names_id:medicine_names_id },

                success: function (data) 
                {
                    var res = data.split("~~"); // to split the fetched data 

                   //alert("Success : " + data); 

                    $("#disease_category").val(res[0]);
                    $("#medicine_names").val(res[1]);
                },
                error:function (data) 
                {
                    alert("Error : " + data);				// if error alert message
                },
            }

        );

    }
            
            
            
           
           
        
