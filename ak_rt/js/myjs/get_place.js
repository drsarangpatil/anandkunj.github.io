$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: '../database/ajax/Get_place.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getPlace" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#at_post").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
	}
);
		       