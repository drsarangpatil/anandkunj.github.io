 $(document).ready
        (
            function() 
            {	
                //alert ("ABC");
                $.ajax
                (
                    {
                        url: 'database/ajax/Get_st_assignment_allocation.php',	
                        type: 'GET',								
                        data: { process: "getFullnames", isApplication:"1"},			

                        success: function(data) 
                        {
                           // alert("Success : " + data);
                            
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
                                url: 'database/ajax/Get_st_assignment_allocation.php',
                                type: 'GET',							
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
                                    $("#address").val(res[5]);
                                    $("#at_post").val(res[6]);
                                    $("#email").val(res[7]);
                                    $("#occupation").val(res[8]);
                                    
                                    
                        
                                $.ajax
                                (
                                    {
                                        url: 'database/ajax/Get_st_assignment_allocation.php',
                                        type: 'GET',							
                                        data: { process: "getCourse_admission_details", person_id:res[0]},

                                        success: function (data) 
                                        {
                                            //alert("Success : " + data);

                                            var res = data.split("~~"); // to split the fetched data

                                            $("#st_course_application_id").val(res[0]);  // to set fetched data
                                            $("#course_name").val(res[1]);
                                            $("#doa").val(res[2]);
                                            $("#doc").val(res[3]);
                                            $("#course_duration").val(res[4]);
                                            $("#ad_status").val(res[5]);
                                            $("#course_language").val(res[6]);
                                            $("#mother_tongue").val(res[7]);


                                            },
                                        error:function (data) 
                                        {
                                            alert("Error : " + data);				// if error alert message
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

