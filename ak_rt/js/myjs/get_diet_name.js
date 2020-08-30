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
					$("#morning_diets").html(data);					// to set fetched data
                    $("#noon_diets").html(data);	
                    $("#afternoon_diets").html(data);	
                    $("#evening_diets").html(data);	
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
	}
);
		       