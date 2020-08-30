 
    $(document).ready
        (
            function () 
            {	
                //alert ("ABC");
                $.ajax
                (
                    {
                        url: 'database/ajax/Get_op_billing_up.php',	// call page for data to be retrived
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
                                url: 'database/ajax/Get_op_billing_up.php',// call page for data to be retrived
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
                                            url: 'database/ajax/Get_op_billing_up.php',// call page for data to be retrived
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
                                                        url: 'database/ajax/Get_op_billing_up.php',// call page for data to be retrived
                                                        type: 'GET',				// to get data in backgrouond
                                                        data: { process: "getAll_billing_records", op_case_sheet_id:res[0]},	
                                                        // what exactly we have retrive other details

                                                        success: function (data) 
                                                        {
                                                           //alert("Success 3: " + data);

                                                           $("#old_billing_records_list").html(data);

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
            var op_billing_id = $('#op_billing_id').val();
            
            //alert(op_billing_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_op_billing_up.php',
                    type: 'GET',							
                    data: { process: "getSelected_bill_data", op_billing_id:op_billing_id },

                    success: function (data) 
                    {
                        var res = data.split("~~"); // to split the fetched data
                        
                        $("#casepaper_amount").val(res[0]);
                        $("#consultation_amount").val(res[1]);  // to set fetched data
                        $("#treatment_amount").val(res[2]);
                        $("#diet_amount").val(res[3]);
                        $("#medicine_amount").val(res[4]);
                        $("#other_amount").val(res[5]);
                        $("#discount_amount").val(res[6]);
                        //$("#tax_amount").val(res[7]);
                        $("#payable_amount").val(res[7]);
                        $("#payment_status").val(res[8]);
                        //alert("Success : " + data);

                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           
        }