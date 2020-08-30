$(document).ready
(
	function () 
	{	
		$.ajax
		(
			{
				url: 'database/ajax/Get_room_number_up.php',			// call page for data to be retrived
				type: 'GET',								// to get data in backgrouond
				data: { process: "getRoom_number_records" },			// what exactly required 

				success: function (data) 
				{
					//alert("Success : " + data);
					$("#all_room_number_records").html(data);					// to set fetched data
				},
				error:function (data) 
				{
					alert("Error : " + data);				// if error alert message
				},
			}

		);
		
	   }
    );
		       

 function myshow()
    {
        var room_number_id = $('#room_number_id').val();

        //alert(room_number_id);
        $.ajax
        (
            {
                url: 'database/ajax/Get_room_number_up.php',
                type: 'GET',							
                data: { process: "getSelected_room_number_data", room_number_id:room_number_id },

                success: function (data) 
                {
                    var res = data.split("~~"); // to split the fetched data 

                   //alert("Success : " + data); 

                    $("#building_name").val(res[0]);
                    $("#room_number").val(res[1]);
                    $("#room_status").val(res[2]);
                },
                error:function (data) 
                {
                    alert("Error : " + data);				// if error alert message
                },
            }

        );

    }
            
            
            
           
           
        
