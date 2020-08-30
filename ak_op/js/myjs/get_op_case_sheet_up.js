 $(document).ready
        (
            function () 
            {	
                //alert ("ABC");
                $.ajax
                (
                    {
                        url: 'database/ajax/Get_op_case_sheet_up.php', // call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getFullnames", isCasepaper:"1"},			// what exactly required 

                        success: function (data) 
                        {
                           // alert("Success : " + data);
                            
                            $("#full_names").html(data); // to set fetched data
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);		// if error alert message
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
                                url: 'database/ajax/Get_op_case_sheet_up.php',// call page for data to be retrived
                                type: 'GET',							// to get data in backgrouond
                                data: { process: "getOther_details", full_name:full_name},	
                                // what exactly we have retrive other details

                                success: function (data) 
                                {
                                    //alert("Success : " + data);
                                    
                                    var res = data.split("~~"); // to split the fetched data
                                    
                                    $("#person_id").val(res[0]);  // to set fetched data
                                    $("#dob").val(res[1]);
                                    $("#gender").val(res[2]);
                                    $("#mobile_no").val(res[3]);
                                    $("#photo").attr("src", "../ak_com/database/photos/"+res[4]);
                                    
                                    // to calculate age  
                                    var years = (new Date() - new Date($("#dob").val())) / (1000 * 60 * 60 * 24 * 365);
                                     $("#age").val(Math.round(years));
                                    
                                    $.ajax
                                    (
                                        {
                                            url: 'database/ajax/Get_op_case_sheet_up.php',// call page for data to be retrived
                                            type: 'GET',				// to get data in backgrouond
                                            data: { process: "getAll_case_sheet_records", person_id:res[0]},	
                                            // what exactly we have retrive other details

                                            success: function (data) 
                                            {
                                               //alert("Success : " + data);

                                               $("#old_case_paper_list").html(data);

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
                                    alert("Error : " + data);	// if error alert message
                                },
                            }

                        );
                        
                    }
                );
                
            }
        );

       function myshow()
        {

            var op_case_sheet_id = $('#op_case_sheet_id').val();
            
            //alert(op_case_sheet_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_op_case_sheet_up.php',// call page for data to be retrived
                    type: 'GET',							// to get data in backgrouond
                    data: { process: "getSelected_case_sheet_data", op_case_sheet_id:op_case_sheet_id},	
                    // what exactly we have retrive other details

                    success: function (data) 
                    {
                        //alert("Success : " + data);

                        var res = data.split("~~"); // to split the fetched data
                        $("#case_paper_date").val(res[0]);
                        $("#schedule").val(res[1]);
                        $("#present_complaints").val(res[2]);  // to set fetched data
                        $("#past_history").val(res[3]);
                        $("#clinical_history").val(res[4]);
                        $("#final_diagnosis").val(res[5]);
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           /* $.ajax
            (
                {
                    url: 'database/ajax/Get_op_case_sheet_up.php',// call page for data to be retrived
                    type: 'GET',							// to get data in backgrouond
                    data: { process: "getSelected_case_sheet_fd_data", op_case_sheet_id:op_case_sheet_id},	
                    // what exactly we have retrive other details

                    success: function (data) 
                    {
                       //alert("Success : " + data);
                        
                        $("#final_diagnosis").html(data);		// to set fetched data

                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );*/

        }
