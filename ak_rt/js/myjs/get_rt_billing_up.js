 
$(document).ready
(
function () 
{	
    //alert ("ABC");
    $.ajax
    (
        {
            url: 'database/ajax/Get_rt_billing_up.php',	// call page for data to be retrived
            type: 'GET',								            // to get data in backgrouond
            data: { process: "getFullnames", isCasepaper:"1"}, // what exactly required 

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
                url: 'database/ajax/Get_rt_billing_up.php',
                type: 'GET',							
                data: { process: "getOther_details", full_name:full_name},	
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
                            url: 'database/ajax/Get_rt_billing_up.php',
                            type: 'GET',							
                            data: { process: "getFinal_diagnosis", person_id:res[0]},

                            success: function (data) 
                            {
                                 var response = data.split("~~"); 
                               //alert("Success 2: " +response[0] +"---"+data);

                                $("#rt_case_sheet_id").val(response[0]);  
                                $("#final_diagnosis").val(response[1]);

                                   $.ajax
                                    (
                                        {
                                            url: 'database/ajax/Get_rt_billing_up.php', 
                                            type: 'GET',							
                                            data: { process: "getRetreat_details", rt_case_sheet_id:response[0]},

                                            success: function (data) 
                                            {
                                                //alert("Success 1: " + data);

                                                var res = data.split("~~"); 

                                                $("#doa").val(res[0]);  
                                                $("#retreat_name").val(res[1]);
                                                $("#retreat_duration").val(res[2]);
                                                $("#doc").val(res[3]);
                                                
                                                $.ajax
                                                (
                                                    {
                                                        url: 'database/ajax/Get_rt_billing_up.php', 
                                                        type: 'GET',							
                                                        data: { process: "getRoom_details", rt_case_sheet_id:response[0]},

                                                        success: function (data) 
                                                        {
                                                            //alert("Success 1: " + data);

                                                            var res = data.split("~~"); 

                                                            $("#room_number").val(res[0]);
                                                            $("#no_attendant").val(res[1]);

                                                $.ajax
                                                (
                                                    {
                                                        url: 'database/ajax/Get_rt_billing_up.php',// call page for data to be retrived
                                                        type: 'GET',	// to get data in backgrouond
                                                        data: { process: "getAll_billing_records", rt_case_sheet_id:response[0]},	
                                                        // what exactly we have retrive other details

                                                        success: function (data) 
                                                        {
                                                           //alert("Success 3: " + data);

                                                           $("#old_estimation_records_list").html(data);

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
                                                            alert("Error : " + data); // if error alert message
                                                        },
                                                    }

                                                );
                                                
                                                
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
            var rt_estimation_id = $('#rt_estimation_id').val();
            
            //alert(rt_estimation_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_rt_billing_up.php',
                    type: 'GET',							
                    data: { process: "getSelected_bill_data", rt_estimation_id:rt_estimation_id },

                    success: function (data) 
                    {
                        var res = data.split("~~"); // to split the fetched data 
                        
                        //alert("Success : " + data); 
                        
                        $("#rt_estimate_date").val(res[0]);
                        $("#schedule").val(res[1]);  // to set fetched data
                        $("#retreat_donation").val(res[2]);
                        $("#attendant_donation").val(res[3]);
                        $("#accommodation_donation").val(res[4]);
                        $("#food_donation").val(res[5]);
                        $("#other_donation").val(res[6]);
                        $("#discount_amount").val(res[7]);
                        $("#payable_amount").val(res[8]);
                        $("#payment_status").val(res[9]);
                        $("#pan_name").val(res[10]);
                        $("#pan_number").val(res[11]);
                        
                        

                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           
        }