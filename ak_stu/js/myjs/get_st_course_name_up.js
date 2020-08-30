$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_st_course_name_up.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getCourse_name_records" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#all_st_course_name_records").html(data);					// to set fetched data
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
            var course_name_id = $('#course_name_id').val();
            
            //alert(course_name_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_st_course_name_up.php',
                    type: 'GET',							
                    data: { process: "getSelected_course_name_data", course_name_id:course_name_id },

                    success: function (data) 
                    {
                        var res = data.split("~~"); // to split the fetched data 
                        
                       //alert("Success : " + data); 
                        
                        $("#course_name").val(res[0]);
                        $("#course_name_id").val(res[1]);
                        
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           
        }
            
            
            
           
           
        
