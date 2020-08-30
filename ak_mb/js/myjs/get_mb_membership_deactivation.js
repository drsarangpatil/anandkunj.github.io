 $(document).ready
        (
            function() 
            {	
                //alert ("ABC");
                 $.ajax
                (
                    {
                        url: 'database/ajax/Get_mb_membership_deactivation.php',	// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getFullnames", isCasepaper:"1" },	// what exactly required

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
                                url: 'database/ajax/Get_mb_membership_deactivation.php',// call page for data to be retrived
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
                                    $("#pin_code").val(res[7]);
                                    $("#district_name").val(res[8]);
                                    $("#state_name").val(res[9]);
                                    $("#occupation").val(res[10]);
                                    $("#occu_spl_fea").val(res[11]);
                                    $("#emergency_no").val(res[12]);
                                    $("#email").val(res[13]);
                                    
                                 $.ajax
                                    (
                                        {
                                            url: 'database/ajax/Get_mb_membership_deactivation.php',// call page for data to be retrived
                                            type: 'GET',	// to get data in backgrouond
                                            data: { process: "getAll_membership_records", person_id:res[0]},	
                                            // what exactly we have retrive other details

                                            success: function (data) 
                                            {
                                               //alert("Success 3: " + data);

                                               $("#old_membership_records_list").html(data);   
                                    
                                 
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
                
                $.ajax
                (
                    {
                        url: 'database/ajax/Get_mb_membership_deactivation.php',			
                        type: 'GET',								
                        data: { process: "getAll_deactivated_membership_records" },			

                        success: function (data) 
                        {
                            //alert("Success : " + data);
                            $("#old_deactivated_membership_records_list").html(data);					
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);				
                        },
                    }

                );

            }
        );


  function myshow()
        {
            var mb_membership_id = $('#mb_membership_id').val();
            
            //alert(mb_membership_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_mb_membership_deactivation.php',
                    type: 'GET',							
                    data: { process: "getSelected_membership_data", mb_membership_id:mb_membership_id },

                    success: function (data) 
                    {
                        var res = data.split("~~"); // to split the fetched data 
                        
                       // alert("Success : " + data); 
                        
                        $("#association_name").val(res[0]);
                        $('#association_name').trigger('change');
                        $("#membership_typea").val(res[1]);
                        
                        $("#membership_amount").val(res[2]);
                        $("#mem_status").val(res[3]);
                        $("#dos").val(res[4]);
                        $("#doc").val(res[5]);
                        $("#membership_duration").val(res[6]);
                        $("#commune").val(res[7]);
                        
                        //association_name, membership_type, membership_amount, mem_status, dos, doc, membership_duration, commune

                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           
        }
