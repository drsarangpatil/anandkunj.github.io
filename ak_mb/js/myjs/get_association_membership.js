$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_association_membership.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getAssociation_names" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#association_name").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
		$('#association_name').change			// process to call on change in disease_category dropdown
        
		( 
			function() 
			{
				var association_name = $('#association_name').val(); 
                
				$.ajax
				(
					{
						url: 'database/ajax/Get_association_membership.php',	// call page for data to be                                                          retrived
						type: 'GET',									// to get data in backgrouond
						data: { process: "getMembership_types", association_name:association_name},	

						success: function (data) 
						{
							//alert("Success : " + data);
							$("#membership_type").html(data);					// to set fetched data
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					 }
				  );
                }
            );
                
          $('#membership_type').change			// process to call on change in disease_name dropdown
                ( 
                    function() 
                    {
                        var membership_type = $('#membership_type').val();		
                        var association_name = $('#association_name').val(); 
                        //alert(association_name + "----" + association_name);      

                    $.ajax
                    (
                        {
                            url: 'database/ajax/Get_association_membership.php',	// call page for data to be retrived
                            type: 'GET',									// to get data in backgrouond
                            data: { process: "getMembership_amount", association_name:association_name, membership_type:membership_type },	                   // what exactly required 

                            success: function (data) 
                            {
                                //alert("Success : " + data);
                                var res = data.split("~~"); 
                                $("#membership_amount").val(res[0]);
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
		       