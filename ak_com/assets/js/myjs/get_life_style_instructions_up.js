$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_life_style_instructions_up.php',// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getlife_style_instructions_records" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#all_life_style_instruction_records").html(data);					// to set fetched data
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
            var life_style_instructions_id = $('#life_style_instructions_id').val();
            
            //alert(life_style_instructions_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_life_style_instructions_up.php',
                    type: 'GET',							
                    data: { process: "getSelected_life_style_instructions_data", life_style_instructions_id:life_style_instructions_id },

                    success: function (data) 
                    {
                        var res = data.split("~~"); // to split the fetched data 
                        
                      // alert("Success : " + data); 
                       
                        $("#disease_category").val(res[0]);
                        $("#language").val(res[1]);
                        $("#life_style_instructions").val(res[2]);
                        
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           
        }
            
            
            
           
           
        
