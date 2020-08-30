$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_magazine_subscription.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getMagazine_names" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#magazine_name").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
        
        $('#magazine_name').change			// process to call on change in disease_category dropdown
		( 
			function() 
			{
                
				var magazine_name = $('#magazine_name').val(); 
                
				$.ajax
				(
					{
						url: 'database/ajax/Get_magazine_subscription.php',	// call page for data to be                                                          retrived
						type: 'GET',									// to get data in backgrouond
						data: { process: "getSubscription_types", magazine_name:magazine_name},	

						success: function (data) 
						{
							//alert("Success : " + data);
							$("#subscription_type").html(data);					// to set fetched data
                            
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					 }
				  );
                }
            );

          $('#subscription_type').change			// process to call on change in disease_name dropdown
                ( 
                    function() 
                    {
                        var subscription_type = $('#subscription_type').val();		
                        var magazine_name = $('#magazine_name').val(); 
                        //alert(magazine_name + "----" + subscription_type);      

                    $.ajax
                    (
                        {
                            url: 'database/ajax/Get_magazine_subscription.php',	// call page for data to be retrived
                            type: 'GET',									// to get data in backgrouond
                            data: { process: "getSubscription_amount", magazine_name:magazine_name, subscription_type:subscription_type },	                   // what exactly required 

                            success: function (data) 
                            {
                                //alert("Success : " + data);
                                var res = data.split("~~"); 
                                $("#subscription_amount").val(res[0]);
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
		       

function myshow()
        {
            
         $.ajax
            (
                {
                    url: 'database/ajax/Get_magazine_subscription.php',
                    type: 'GET',				
                    data: { process: "getSb_subscription_type_records"},

                    success: function (data) 
                    {
                       //alert("Success 3: " + data);

                       $("#all_subscription_type_records").html(data);
                    },
               error:function (data) 
                {
                    alert("Error : " + data);
                },
            }

        );  
            
        $.ajax
            (
                {
                    url: 'database/ajax/Get_magazine_subscription.php',
                    type: 'GET',				
                    data: { process: "getSb_magazine_records"},

                    success: function (data) 
                    {
                       //alert("Success 3: " + data);

                       $("#all_magazine_records").html(data);
                    },
               error:function (data) 
                {
                    alert("Error : " + data);
                },
            }

        );        
            
           
           
        }
