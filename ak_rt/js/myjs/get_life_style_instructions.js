$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_life_style_instructions.php',	// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getDisease_categorya" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#disease_categorys").html(data);			// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
		$('#disease_categorya').change			// process to call on change in data dropdown
		( 
			function() 
			{
				var disease_category = $('#disease_categorya').val();
                
                $.ajax
				(
					{
						url: 'database/ajax/Get_life_style_instructions.php',	// call page for data to be retrived
						type: 'GET',									// to get data in backgrouond
						data: { process: "getLanguage", disease_category:disease_category },	// what exactly required 

						success: function (data) 
						{
							//alert("Success : " + data);
							$("#languages").html(data);		// to set fetched data
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					   }
				    );
                
				/*$.ajax
				(
					{
						url: 'database/ajax/Get_life_style_instructions.php',	
						type: 'GET',									
						data: { process: "getDisease_namea", disease_category:disease_category},	

						success: function (data) 
						{
							//alert("Success : " + data);
							$("#disease_names").html(data);					// to set fetched data
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					}

				);*/

			}
		);
        
        /*$('#disease_namea').change			// process to call on change in state dropdown
		  ( 
			function() 
			{
				var disease_name = $('#disease_namea').val();		
				var disease_category = $('#disease_categorya').val();		
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
							$("#languages").html(data);		// to set fetched data
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					   }
				    );
			     }
		      );*/
        
            $('#language').change			// process to call on change in state dropdown
		      ( 
                function() 
                {
                    var language = $('#language').val();
                   // var disease_name = $('#disease_namea').val();		
                    var disease_category = $('#disease_categorya').val();		
                    //alert(language + "----" + disease_name);

                    $.ajax
                    (
                        {
                            url: 'database/ajax/Get_life_style_instructions.php',	// call page for data to be retrived
                            type: 'GET',									// to get data in backgrouond
                            data: { process: "getLife_style_instructions", disease_category:disease_category, language:language },	// what exactly required 

                            success: function (data) 
                            {
                                //alert("Success : " + data);
                                $("#life_style_instruction").html(data);		// to set fetched data
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
		       