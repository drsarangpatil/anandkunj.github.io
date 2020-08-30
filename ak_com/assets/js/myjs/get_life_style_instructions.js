$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_life_style_instructions.php',	// call page for data to be retrived
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
		
		$('#disease_category').change			// process to call on change in data dropdown
		( 
			function() 
			{
				var disease_category = $('#disease_category').val();	
				$.ajax
				(
					{
						url: 'database/ajax/Get_life_style_instructions.php',	
						type: 'GET',									
						data: { process: "getDisease_name", disease_category:disease_category},	

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
				var disease_name = $('#disease_name').val();		
				var disease_category = $('#disease_category').val();		
				//alert(disease_name + "----" + disease_category);
				
				$.ajax
				(
					{
						url: 'database/ajax/Get_life_style_instructions.php',	// call page for data to be retrived
						type: 'GET',									// to get data in backgrouond
						data: { process: "getLanguage", disease_category:disease_category, disease_name:disease_name },	// what exactly required 

						success: function (data) 
						{
							//alert("Success : " + data);
							$("#language").html(data);		// to set fetched data
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					   }
				    );
			     }
		      );
        
            $('#language').change			// process to call on change in state dropdown
		      ( 
                function() 
                {
                    var language = $('#language').val();
                    var disease_name = $('#disease_name').val();		
                    var disease_category = $('#disease_category').val();		
                    //alert(language + "----" + disease_name);

                    $.ajax
                    (
                        {
                            url: 'database/ajax/Get_life_style_instructions.php',	// call page for data to be retrived
                            type: 'GET',									// to get data in backgrouond
                            data: { process: "getLife_style_instructions", disease_category:disease_category, disease_name:disease_name, language:language },	// what exactly required 

                            success: function (data) 
                            {
                                //alert("Success : " + data);
                                $("#life_style_instructions").html(data);		// to set fetched data
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
		       