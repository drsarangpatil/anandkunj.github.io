
    $(document).ready
        (
            function () 
            {	
                //alert ("ABC");
                $("#main_namea").hide();
                $.ajax
                (
                    {
                        url: 'database/ajax/Get_organization_info.php',	// call page for data to be retrived
                        type: 'GET',								// to get data in backgrouond
                        data: { process: "getMainnames" },			// what exactly required 

                        success: function (data) 
                        {
                           //alert("Success : " + data);
                            if(data!="")
                                $("#main_names").html(data);			// to set fetched data
                            
                        },
                        error:function (data) 
                        {
                            alert("Error : " + data);				// if error alert message
                        },
                    }

                );

                $('#main_name').change			// process to call on change in  dropdown
                ( 
                    function() 
                    {
                        
                        var main_name = $('#main_name').val();	// read main_name from main_name dropdown
                        
                        main_name=  main_name.split("-")[0];
                        
                        $('#main_name').val(main_name);
                        $('#main_namea').val(main_name);
                        $("#main_namea").show();
                        $("#main_name").hide();
                        
                        
                        $.ajax
                        (
                            {
                                url: 'database/ajax/Get_organization_info.php',// call page for data to be retrived
                                type: 'GET',							// to get data in backgrouond
                                data: { process: "getAll_details", main_name:main_name},	
                                // what exactly we have retrive other details

                                success: function (data) 
                                {
                                    //alert("Success : " + data);
                                    
                                    var res = data.split("~~"); // to split the fetched data
                                    
                                    $("#org_id").val(res[0]);  // to set fetched data
                                    $("#doo").val(res[1]);
                                    $("#main_name").val(res[2]);
                                    $("#org_slogan").val(res[3]);
                                    $("#parent_org").val(res[4]);
                                    $("#other_title").val(res[5]);
                                    $("#logo").attr("src", "database/logos/"+res[6]);
                                    $("#address").val(res[7]);
                                    $("#at_post").val(res[8]);
                                    $("#pin_code").val(res[9]);
                                    $("#residence_phone1").val(res[10]);
                                    $("#residence_phone2").val(res[11]);
                                    $("#mobile_no").val(res[12]);
                                    $("#whatsapp_no").val(res[13]);
                                    $("#email").val(res[14]);
                                    $("#website").val(res[15]);                                    
                                    $("#bank_name").val(res[16]);
                                    $("#ifsc_code").val(res[17]);
                                    $("#account_no").val(res[18]);
                                    $("#reg_autho").val(res[19]);
                                    $("#doi").val(res[20]);
                                    $("#org_reg_no").val(res[21]);
                                    $("#gst_reg_no").val(res[22]);
                                   // $("#user_id").val(res[23]);
                                    
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
