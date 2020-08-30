$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_retreat_name.php',	// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getRetreat_name" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#retreat_name").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
	}
);
		       