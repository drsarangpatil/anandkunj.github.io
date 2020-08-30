 $(document).ready
        (
            function() 
            {	
                //alert ("ABC");
                $.ajax
                (
                    {
                        url: 'database/ajax/Get_st_course_application_from_up.php',	// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getFullnames", isApplication:"1"},			// what exactly required 

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
                                url: 'database/ajax/Get_st_course_application_from_up.php',// call page for data to be retrived
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
                                    $("#address").val(res[5]);
                                    $("#at_post").val(res[6]);
                                    $("#email").val(res[7]);
                                    $("#occupation").val(res[8]);
                                    
                                    $.ajax
                                    (
                                        {
                                            url: 'database/ajax/Get_st_course_application_from_up.php',// call page for data to be retrived
                                            type: 'GET',				// to get data in backgrouond
                                            data: { process: "getAll_course_admission_records", person_id:res[0]},

                                            success: function (data) 
                                            {
                                               //alert("Success : " + data);

                                               $("#course_admission_records").html(data);

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

            var st_course_application_id = $('#st_course_application_id').val();
            
            //alert(st_course_application_id);
            
            $.ajax
            (
                {
                    url: 'database/ajax/Get_st_course_application_from_up.php',// call page for data to be retrived
                    type: 'GET',							     // to get data in backgrouond
                    data: { process: "getSelected_course_data", st_course_application_id:st_course_application_id},	
                    // what exactly we have retrive other details

                    success: function (data) 
                    {
                        //alert("Success : " + data);

                        var res = data.split("~~"); // to split the fetched data

                        $("#doa").val(res[0]);
                        $("#course_name").val(res[1]);
                        $("#ad_status").val(res[2]);
                        $("#course_duration").val(res[3]);
                        $("#doc").val(res[4]);  
                        $("#course_language").val(res[5]);
                        $("#mother_tongue").val(res[6]);
                        $("#g_name").val(res[7]);
                        $("#g_relation").val(res[8]);
                        $("#g_mobile").val(res[9]);
                        $("#g_email").val(res[10]);
                        $("#notify_via").val(res[11]);
                        $("#adhar_no").val(res[12]);
                        $("#pan_no").val(res[13]);
                        $("#qualifcation1").val(res[14]);
                        $("#institute1").val(res[15]);
                        $("#grade1").val(res[16]);
                        $("#qualifcation2").val(res[17]);
                        $("#institute2").val(res[18]);
                        $("#grade2").val(res[19]);
                        $("#qualifcation3").val(res[20]);
                        $("#institute3").val(res[21]);
                        $("#grade3").val(res[22]);
                        $("#course1").val(res[23]);
                        $("#org1").val(res[24]);
                        $("#outcome1").val(res[25]);
                        $("#course2").val(res[26]);
                        $("#org2").val(res[27]);
                        $("#outcome2").val(res[28]);
                        $("#work_exprience").val(res[29]);
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
          
        }


