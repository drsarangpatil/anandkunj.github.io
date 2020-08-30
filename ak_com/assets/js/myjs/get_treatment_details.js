$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_treatment_details.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getTreatment_name" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#treatment_name").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
        
        $.ajax
		(
			{
				url: 'database/ajax/Get_treatment_details.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getTherapy_dept" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#therapy_dept").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
        
        $.ajax
		(
			{
				url: 'database/ajax/Get_treatment_details.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getTreatment_time" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#treatment_time").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
        
        $.ajax
		(
			{
				url: 'database/ajax/Get_treatment_details.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getTherapist_name" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#staff_short_name").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
	}
);
		       