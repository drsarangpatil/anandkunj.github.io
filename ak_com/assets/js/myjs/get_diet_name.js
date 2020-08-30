$(document).ready
(
	function () 
	{	
        //alert("llll");
		$.ajax
		(
			{
				url: 'database/ajax/Get_diet_name.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getDiet_name" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#morning_diet").html(data);					// to set fetched data
                    $("#noon_diet").html(data);	
                    $("#afternoon_diet").html(data);	
                    $("#evening_diet").html(data);	
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
	}
);
		       