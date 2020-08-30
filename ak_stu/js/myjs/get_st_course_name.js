$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_st_course_name.php',	// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getCourse_name" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#course_name").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
	}
);
		       