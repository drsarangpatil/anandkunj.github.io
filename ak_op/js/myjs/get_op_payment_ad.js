 
    $(document).ready
        (
            function () 
            {	
                //alert ("ABC");
                $.ajax
                (
                    {
                        url: 'database/ajax/Get_op_payment_ad.php',	// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getFullnames", isBilling:"1"},		// what exactly required 

                        success: function (data) 
                        {
                           //alert("Success : " + data);
                            
                            $("#full_names").html(data);			// to set fetched data
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);				// if error alert message
                        },
                    }

                );

                $('#full_name').change			// process to call on change in  dropdown
                ( 
                    function() 
                    {
                        var full_name = $('#full_name').val();	// read full_name from full_name dropdown
                        full_name=  full_name.split("-")[0];
                        $('#full_name').val(full_name);
                        
                        //alert(full_name);
                        
                        $.ajax
                        (
                            {
                                url: 'database/ajax/Get_op_payment_ad.php',// call page for data to be retrived
                                type: 'GET',							// to get data in backgrouond
                                data: { process: "getOther_details", full_name:full_name},	
                                // what exactly we have retrive other details

                                success: function (data) 
                                {
                                    //alert("Success 1: " + data);
                                    
                                    var res = data.split("~~"); // to split the fetched data
                                    
                                    $("#person_id").val(res[0]);  // to set fetched data
                                    $("#dob").val(res[1]);
                                    $("#gender").val(res[2]);
                                    $("#mobile_no").val(res[3]);
                                    $("#photo").attr("src", "../ak_com/database/photos/"+res[4]);
                                    
                                    // to calculate age  
                                    var years = (new Date() - new Date($("#dob").val())) / (1000 * 60 * 60 * 24 * 365);
                                     $("#age").val(Math.round(years));
                                    //alert("Success pid: " + res[0]);
                                    $.ajax
                                    (
                                        {
                                            url: 'database/ajax/Get_op_payment_ad.php',// call page for data to be retrived
                                            type: 'GET',							// to get data in backgrouond
                                            data: { process: "getFinal_diagnosis", person_id:res[0]},	
                                            // what exactly we have retrive other details

                                            success: function (data) 
                                            {
                                                 var res = data.split("~~"); // to split the fetched data
                                               //alert("Success 2: " +res[0] +"---"+data);

                                               
                                                $("#op_case_sheet_id").val(res[0]);  // to set fetched data
                                                $("#final_diagnosis").val(res[1]);

                                                $.ajax
                                                (
                                                    {
                                                        url: 'database/ajax/Get_op_payment_ad.php',// call page for data to be retrived
                                                        type: 'GET',				// to get data in backgrouond
                                                        data: { process: "getAll_payment_records", op_case_sheet_id:res[0]},	
                                                        // what exactly we have retrive other details

                                                        success: function (data) 
                                                        {
                                                           //alert("Success 3: " + data);

                                                           $("#old_payment_records_list").html(data);

                                                        },
                                                        error:function (data) 
                                                        {
                                                            alert("Error : " + data); // if error alert message
                                                        },
                                                    }

                                                );
                                            },
                                            error:function (data) 
                                            {
                                                alert("Error : " + data);	
                                            },
                                        }

                                    );
                                    
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
            var op_payment_id = $('#op_payment_id').val();
            
            //alert(op_payment_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_op_payment_ad.php',
                    type: 'GET',							
                    data: { process: "getSelected_payment_data", op_payment_id:op_payment_id },

                    success: function (data) 
                    {
                        var res = data.split("~~"); // to split the fetched data
                        
                        $("#op_billing_id").val(res[0]);
                        $("#payable_amount").val(res[1]); // to set fetched data
                        
                        
                        //alert("Success : " + data);

                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           
        }