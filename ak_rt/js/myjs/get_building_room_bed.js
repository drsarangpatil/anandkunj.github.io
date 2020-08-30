$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_building_room_bed.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getBuilding_names" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#building_name").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
		$('#building_name').change			// process to call on change in disease_category dropdown
        
		( 
			function() 
			{
				var building_name = $('#building_name').val(); 
                
				$.ajax
				(
					{
						url: 'database/ajax/Get_building_room_bed.php',			// call page for data to be                                                          retrived
						type: 'GET',									// to get data in backgrouond
						data: { process: "getRoom_numbers", building_name:building_name},	// what                                                                     exactly required 

						success: function (data) 
						{
							//alert("Success : " + data);
							$("#room_number").html(data);					// to set fetched data
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					 }
				  );
                }
            );
                
          $('#room_number').change			// process to call on change in disease_name dropdown
                ( 
                    function() 
                    {
                        var room_number = $('#room_number').val();		// read disease_name from                                                             disease_name dropdown
                        var building_name = $('#building_name').val(); // read disease_category from                                                          disease_category dropdown
                        //alert(disease_name + "----" + disease_category);      

                    $.ajax
                    (
                        {
                            url: 'database/ajax/Get_building_room_bed.php',		// call page for data to be retrived
                            type: 'GET',									// to get data in backgrouond
                            data: { process: "getBed_numbers", building_name:building_name, room_number:room_number },	                   // what exactly required 

                            success: function (data) 
                            {
                                //alert("Success : " + data);
                                $("#bed_number").html(data);			  		// to set fetched data
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
		       