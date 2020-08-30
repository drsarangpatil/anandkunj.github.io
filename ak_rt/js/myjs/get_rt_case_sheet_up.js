 $(document).ready
        (
            function () 
            {	
                //alert ("ABC");
                $.ajax
                (
                    {
                        url: 'database/ajax/Get_rt_case_sheet_up.php', // call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getFullnames", isCasepaper:"1"},	// what exactly required 

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
                        var full_name = $('#full_name').val();	// read full_name from dropdown
                        full_name=  full_name.split("-")[0];
                        $('#full_name').val(full_name);
                        
                        //alert(full_name);
                        
                        $.ajax
                        (
                            {
                                url: 'database/ajax/Get_rt_case_sheet_up.php',// call page for data to be retrived
                                type: 'GET',				// to get data in backgrouond
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
                                            url: 'database/ajax/Get_rt_case_sheet_up.php',// call page for data to be retrived
                                            type: 'GET',				// to get data in backgrouond
                                            data: { process: "getAll_case_sheet_records", person_id:res[0]},

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

            var rt_case_sheet_id = $('#rt_case_sheet_id').val();
            var person_id = $('#person_id').val();
            //alert(rt_case_sheet_id);
            
            $.ajax
            (
                {
                    url: 'database/ajax/Get_rt_case_sheet_up.php',// call page for data to be retrived
                    type: 'GET',							     // to get data in backgrouond
                    data: { process: "getSelected_case_sheet_data", rt_case_sheet_id:rt_case_sheet_id, person_id:person_id},	
                    // what exactly we have retrive other details

                    success: function (data) 
                    {
                        //alert("Success : " + data);

                        var res = data.split("~~"); // to split the fetched data

                        $("#doa").val(res[0]);
                        $("#retreat_name").val(res[1]);
                        $("#retreat_duration").val(res[2]);
                        $("#doc").val(res[3]);
                        
                        $("#present_complaints").val(res[4]);  // to set fetched data
                        $("#past_history").val(res[5]);
                        $("#treatment_history").val(res[6]);
                        $("#family_history").val(res[7]);
                        $("#appetite").val(res[8]);
                        $("#bowel_motions").val(res[9]);
                        $("#urination").val(res[10]);
                        $("#sleep").val(res[11]);
                        $("#food_habits").val(res[12]);
                        $("#addictions").val(res[13]);
                        $("#work_type").val(res[14]);
                        $("#stress_type").val(res[15]);
                        $("#clinical_examination").val(res[16]);
                        $("#weight").val(res[17]);
                        $("#height").val(res[18]);
                        $("#bmi").val(res[19]);
                        $("#investigations").val(res[20]);
                        /*$("#reports").val(res[21]);*/
                        $("#ad_status").val(res[21]);
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
            $.ajax
            (
                {
                    url: 'database/ajax/Get_rt_case_sheet_up.php',// call page for data to be retrived
                    type: 'GET',							// to get data in backgrouond
                    data: { process: "getSelected_case_sheet_fd_data", rt_case_sheet_id:rt_case_sheet_id},	
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

            );

        }
