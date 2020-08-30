$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_address.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getNations" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#nation_name").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
		$('#nation_name').change			// process to call on change in nation dropdown
		( 
			function() 
			{
				var nation = $('#nation_name').val();		// read nation from nation dropdown
                //alert("1111");
				$.ajax
				(
					{
						url: 'database/ajax/Get_address.php',			// call page for data to be retrived
						type: 'GET',									// to get data in backgrouond
						data: { process: "getstates", nation:nation},	// what exactly required 

						success: function (data) 
						{
							//alert("Success : " + data);
							$("#state_name").html(data);					// to set fetched data
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					}

				);
                $('#nation_namea').val(nation);
                
				if(nation == "India" ||  nation == "india")
				{
					$("#passport_doc").attr('disabled', true);
					$("#passport_no").attr('disabled', true);
				}
				else
				{
					$("#passport_doc").attr('disabled', false);
					$("#passport_no").attr('disabled', false);
				}
					
			}
		);
		
		$('#state_name').change			// process to call on change in state dropdown
		( 
			function() 
			{
				var state = $('#state_name').val();		// read nation from state dropdown
				var nation = $('#nation_name').val();		// read nation from nation dropdown
				//alert(state + "----" + nation);
				
				$.ajax
				(
					{
						url: 'database/ajax/Get_address.php',				// call page for data to be retrived
						type: 'GET',									// to get data in backgrouond
						data: { process: "getdistricts", nation:nation, state:state },	// what 																		exactly required 

						success: function (data) 
						{
							//alert("Success : " + data);
							$("#district_name").html(data);			  		// to set fetched data
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					}

				);
                $('#state_namea').val(state)
				
			}
		);
		
		$('#district_name').change			// process to call on change in district dropdown
		( 
			function() 
			{
				var district = $('#district_name').val();    // read district from district dropdown
				var state = $('#state_name').val();		   // read state from state dropdown
				var nation = $('#nation_name').val();		// read nation from nation dropdown
				//alert(district + "----" + state);
				
				$.ajax
				(
					{
						url: 'database/ajax/Get_address.php',			// call page for data to be retrived
						type: 'GET',								// to get data in backgrouond
						data: { process: "gettahsil", nation:nation, state:state, district:district },	// what exactly required 

						success: function (data) 
						{
							//alert("Success : " + data);
							$("#tahsil_name").html(data);					// to set fetched data
						},
						error:function (data) 
						{
							alert("Error : " + data);				// if error alert message
						},
					}

				);
                $('#district_namea').val(district)
			}
		);
        
        $('#tahsil_name').change			// process to call on change in district dropdown
		( 
			function() 
			{
                var tahsil = $('#tahsil_name').val();		// read tahsil from tahsil dropdown
				
				 $('#tahsil_namea').val(tahsil)
            }

        );
               
        
        
        
	}
);
		       