$(document).ready
(
	function () 
	{	
       $.ajax
		(
			{
				url: 'database/ajax/Get_treatment_details.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getTherapy_dept" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#therapy_depts").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		); 
        
        
        $('#therapy_dept').change // process to call on change in disease_category dropdown
        
		( 
			function() 
			{
				var therapy_dept = $('#therapy_dept').val(); // read disease_category from                                                        disease_category dropdown
                
				$.ajax
				(
					{
						url: 'database/ajax/Get_treatment_details.php',			// call page for data to be                                                          retrived
						type: 'GET',									// to get data in backgrouond
						data: { process: "getTreatment_name", therapy_dept:therapy_dept},	// what                                                                     exactly required 

						success: function (data) 
						{
							//alert("Success : " + data);
							$("#treatment_names").html(data);					// to set fetched data
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					 }
				  );
                }
            );
        
        
		/*$.ajax
		(
			{
				url: 'database/ajax/Get_treatment_details.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getTreatment_name" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#treatment_names").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);*/
        
        
        $.ajax
		(
			{
				url: 'database/ajax/Get_treatment_details.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getTreatment_time" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#treatment_times").html(data);					// to set fetched data
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
					$("#staff_short_names").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
	}
);
		       