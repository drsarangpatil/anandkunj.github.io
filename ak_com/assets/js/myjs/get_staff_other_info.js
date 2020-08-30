 $(document).ready
        (
            function () 
            {	
                //alert ("ABC");
                $.ajax
                (
                    {
                        url: 'database/ajax/Get_staff_other_info.php',	// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getFullnames" },			// what exactly required 

                        success: function (data) 
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
                        var full_name = $('#full_name').val();	// read full_name from dropdown
                        full_name=  full_name.split("-")[0];
                        $('#full_name').val(full_name);
                        
                        //alert(full_name);
                        
                        $.ajax
                        (
                            {
                                url: 'database/ajax/Get_staff_other_info.php',// call page for data to be retrived
                                type: 'GET',			// to get data in backgrouond
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
                                            url: 'database/ajax/Get_staff_other_info.php', // call page for data to be retrived
                                            type: 'GET',							// to get data in backgrouond
                                            data: { process: "getStaff_other_info_details", person_id:res[0]},	
                                            // what exactly we have retrive other details

                                            success: function (data) 
                                            {
                                                //alert("Success : " + data);

                                                var res = data.split("~~"); // to split the fetched data

                                                //$("#user_id").val(res[0]);
                                                $("#other_info_date").val(res[1]);
                                                $("#staff_other_info_id").val(res[2]);
                                                $("#staff_short_name").val(res[3]);
                                                $("#mother_tongue").val(res[4]);
                                                $("#religion").val(res[5]);
                                                $("#guardian_name").val(res[6]);
                                                $("#guardian_relation").val(res[7]);
                                                $("#guardian_mobile_no").val(res[8]);
                                                $("#adhar_no").val(res[9]);
                                                $("#pan_no").val(res[10]);
                                                $("#referred_by").val(res[11]);
                                                $("#referrer_m_no").val(res[12]);
                                                $("#past_work_exp").val(res[13]);
                                                $("#qualifcation1").val(res[14]);
                                                $("#institute1").val(res[15]);
                                                $("#grade1").val(res[16]);
                                                $("#qualifcation2").val(res[17]);
                                                $("#institute2").val(res[18]);
                                                $("#grade2").val(res[19]);
                                                $("#doj").val(res[20]);
                                                $("#name_of_dept").val(res[21]);
                                                $("#designation").val(res[22]);
                                                $("#role").val(res[23]);
                                                $("#specialization").val(res[24]);
                                                $("#working_type").val(res[25]);
                                                $("#bank_name").val(res[26]);
                                                $("#ifsc_code").val(res[27]);
                                                $("#account_no").val(res[28]);
                                                $("#password").val(res[29]);
                                                $("#staff_status").val(res[30]);
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