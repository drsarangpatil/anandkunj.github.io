    $(document).ready
        (
            function () 
            {	
                //alert ("ABC");
            $.ajax
            (
                {
                    url: 'database/ajax/Get_dir_medicine_prescription_up.php',	// call page for data to be retrived
                    type: 'GET',								            // to get data in backgrouond
                    data: { process: "getFullnames"}, // what exactly required 

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
                    var full_name = $('#full_name').val();	// read full_name from dropdown
                    full_name=  full_name.split("-")[0];
                    $('#full_name').val(full_name);

                    //alert(full_name);
                        
                        $.ajax
                        (
                            {
                                url: 'database/ajax/Get_dir_medicine_prescription_up.php',// call page for data to be retrived
                                type: 'GET',							// to get data in backgrouond
                                data: { process: "getAll_details", full_name:full_name},	
                                // what exactly we have retrive other details

                                success: function (data) 
                                {
                                    //alert("Success : " + data);
                                    
                                    var res = data.split("~~"); // to split the fetched data
                                    
                                    $("#direct_visit_id").val(res[0]);  // to set fetched data
                                    $("#prescription_date").val(res[1]);
                                    $("#schedule").val(res[2]);
                                    $("#user_id").val(res[3]);
                                    $("#full_name").val(res[4]);
                                    $("#age").val(res[5]);
                                    $("#gender").val(res[6]);
                                    $("#mobile_no").val(res[7]);
                                    $("#complaints").val(res[8]);
                                    $("#weight").val(res[9]);
                                    $("#bp").val(res[10]);
                                    //$("#photo").attr("src", "database/photos/"+res[11]);
                                    $("#oe").val(res[11]);
                                    $("#final_diagnosis").val(res[12]);
                                    
                                     $.ajax
                                    (
                                        {
                                            url: 'database/ajax/Get_dir_medicine_prescription_up.php',
                                            type: 'GET',							
                                            data: { process: "getSelected_medicine_prescription_data", direct_visit_id:res[0] },

                                            success: function (data) 
                                            {
                                              //alert("Success : " + data);
                                                 var res = data.split("~~")

                                                $("#medicine_prescriptions").html(data); // to set fetched data

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
