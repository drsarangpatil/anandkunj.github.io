    $(document).ready
        (
            function () 
            {	
                //alert ("ABC");
                $("#full_namea").hide();
                $.ajax
                (
                    {
                        url: 'database/ajax/Get_registration_form.php',	// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getFullnames" },			// what exactly required 

                        success: function (data) 
                        {
                           //alert("Success : " + data);
                            if(data!="")
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
                        $('#full_namea').val(full_name);
                        $("#full_namea").show();
                        $("#full_name").hide();
                        
                        
                        $.ajax
                        (
                            {
                                url: 'database/ajax/Get_registration_form.php',// call page for data to be retrived
                                type: 'GET',							// to get data in backgrouond
                                data: { process: "getAll_details", full_name:full_name},	
                                // what exactly we have retrive other details

                                success: function (data) 
                                {
                                    //alert("Success : " + data);
                                    
                                    var res = data.split("~~"); // to split the fetched data
                                    
                                    $("#person_id").val(res[0]);  // to set fetched data
                                    $("#dor").val(res[1]);
                                    $("#full_name").val(res[2]);
                                    $("#gender").val(res[3]);
                                    $("#dob").val(res[4]);
                                    $("#pob").val(res[5]);
                                    $("#marital_status").val(res[6]);
                                    $("#male_child").val(res[7]);
                                    $("#female_child").val(res[8]);
                                    $("#occupation").val(res[9]);
                                    $("#occu_spl_fea").val(res[10]);
                                    $("#photo").attr("src", "database/photos/"+res[11]);
                                    $("#address").val(res[12]);
                                    $("#at_post").val(res[13]);
                                    $("#pin_code").val(res[14]);
                                    $("#nation_name").val(res[15]);
                                    $("#nation_namea").val(res[15]);
                                    $('#nation_name').trigger('change');
                                    
                                    /*     alert("before setTimeout");
                                    setTimeout(function(){alert("I am setTimeout");},500000); //delay is in milliseconds 
                                     alert("after setTimeout");*/
                                    
                                    //alert("State : " + res[16] +"====" + res[17] +"====" + res[18] +"====");
                                    
                                    $("#state_namea").val(res[16]);                                    
                                    $("#district_namea").val(res[17]);                                    
                                    $("#tahsil_namea").val(res[18]);
                                   /* $("#passport_no").val(res[19]);
                                    $("#passport_doca").attr("src", "database/passport_doc/"+res[20]);
                                    $("#passport_doc").val(res[20]);*/
                                    $("#residence_phone").val(res[19]);
                                    $("#mobile_no").val(res[20]);
                                    $("#emergency_no").val(res[21]);
                                    $("#whatsapp_no").val(res[22]);
                                    $("#email").val(res[23]);
                                    $("#reference").val(res[24]);
                                    
                                    //alert("S : " + res[25] +"====" + res[26] +"====" + res[27] +"====");
                                    
                                   $("#pc").val( res[25] + ", " + res[26] + ", " + res[27] + ", " + res[28] + ", " + res[29] + ", " + res[30] + ", " + res[31]);
                                    /*$("#participant").val(res[25]);
                                    $("#patient").val(res[26]);
                                    $("#student").val(res[27]);
                                    $("#employee").val(res[28]);
                                    $("#subscriber").val(res[29]);
                                    $("#member").val(res[30]);
                                    $("#donner").val(res[31]);*/
                                    //$("#user_id").val(res[32]);
                                    
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
