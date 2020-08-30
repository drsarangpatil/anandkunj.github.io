$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_diseases.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getDisease_category" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#disease_category").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
		$('#disease_category').change			// process to call on change in disease_category dropdown
        
		( 
			function() 
			{
				var disease_category = $('#disease_category').val();		// read disease_category from                                                                 disease_category dropdown
                
				$.ajax
				(
					{
						url: 'database/ajax/Get_diseases.php',			// call page for data to be                                                          retrived
						type: 'GET',									// to get data in backgrouond
						data: { process: "getDisease_name", disease_category:disease_category},	// what                                                                     exactly required 

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
                
          $('#disease_name').change			// process to call on change in disease_name dropdown
                ( 
                    function() 
                    {
                        var disease_name = $('#disease_name').val();		// read disease_name from                                                             disease_name dropdown
                        var disease_category = $('#disease_category').val(); // read disease_category from                                                          disease_category dropdown
                        //alert(disease_name + "----" + disease_category);      

                    $.ajax
                    (
                        {
                            url: 'database/ajax/Get_diseases.php',				// call page for data to be retrived
                            type: 'GET',									// to get data in backgrouond
                            data: { process: "getDisease_nick", disease_category:disease_category, disease_name:disease_name },	                   // what exactly required 

                            success: function (data) 
                            {
                                //alert("Success : " + data);
                                $("#disease_nick").html(data);			  		// to set fetched data
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
		       