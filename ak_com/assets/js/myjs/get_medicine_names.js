$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_medicine_names.php',	// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getDisease_category" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#disease_category").html(data);			// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
		$('#disease_category').change			// process to call on change in  dropdown
		( 
			function() 
			{
				var disease_category = $('#disease_category').val();	// read nation from nation dropdown
				$.ajax
				(
					{
						url: 'database/ajax/Get_medicine_names.php',// call page for data to be retrived
						type: 'GET',									// to get data in backgrouond
						data: { process: "getDisease_name", disease_category:disease_category},	// what exactly required 

						success: function (data) 
						{
							//alert("Success : " + data);
							$("#disease_name").html(data);					// to set fetched data
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					}

				);

			}
		);
        
        $('#disease_name').change			// process to call on change in state dropdown
		  ( 
			function() 
			{
				var disease_name = $('#disease_name').val();		// read data from  dropdown
				var disease_category = $('#disease_category').val();// read data from  dropdown
				//alert(disease_name + "----" + disease_category);
				$.ajax
				(
					{
						url: 'database/ajax/Get_medicine_names.php',	// call page for data to be retrived
						type: 'GET',									// to get data in backgrouond
						data: { process: "getMedicine_names", disease_category:disease_category, disease_name:disease_name },	// what exactly required 

						success: function (data) 
						{
							//alert("Success : " + data);
							$("#medicine_names").html(data);// to set fetched data
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					}

				);
            }
		);
        $('#medicine_names').change			// process to call on change in state dropdown
		  ( 
			function() 
			{
				var medicine_names = $('#medicine_names').val();
                var disease_name = $('#disease_name').val();		// read data from  dropdown
				var disease_category = $('#disease_category').val();// read data from  dropdown
				//alert(disease_name + "----" + disease_category);
				$.ajax
				(
					{
						url: 'database/ajax/Get_medicine_names.php',	// call page for data to be retrived
						type: 'GET',									// to get data in backgrouond
						data: { process: "getDosage", disease_category:disease_category, disease_name:disease_name, medicine_names:medicine_names },	// what exactly required 

						success: function (data) 
						{
							//alert("Success : " + data);
							$("#dosage").html(data);// to set fetched data
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					}

				);
            }
		);
        
	}
);
		       