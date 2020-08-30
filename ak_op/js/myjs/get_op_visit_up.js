 
$(document).ready
(
function () 
{	
    //alert ("ABC");
    $.ajax
    (
        {
            url: 'database/ajax/Get_op_visit_up.php',	// call page for data to be retrived
            type: 'GET',								            // to get data in backgrouond
            data: { process: "getFullnames", isPrescription:"1"}, // what exactly required 

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
                    url: 'database/ajax/Get_op_visit_up.php',
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
                                url: 'database/ajax/Get_op_visit_up.php',
                                type: 'GET',							
                                data: { process: "getFinal_diagnosis", person_id:res[0]},

                                success: function (data) 
                                {
                                     var response = data.split("~~"); 
                                   //alert("Success 2: " +response[0] +"---"+data);

                                    $("#op_case_sheet_id").val(response[0]);  
                                    $("#final_diagnosis").val(response[1]);

                                    $.ajax
                                    (
                                        {
                                            url: 'database/ajax/Get_op_visit_up.php',
                                            type: 'GET',				
                                            data: { process: "getOp_visit_records", op_case_sheet_id:response[0]},

                                            success: function (data) 
                                            {
                                               //alert("Success 3: " + data);

                                               $("#old_op_visit_records_list").html(data);

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
                                    alert("Error : " + data);	
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
        }
    );

}
);

    function myshow()
        {
            var op_visit_id = $('#op_visit_id').val();
            
            //alert(op_visit_id);
            
            $.ajax
            (
                {
                    url: 'database/ajax/Get_op_visit_up.php',
                    type: 'GET',							
                    data: { process: "getVisit_health_details", op_visit_id:op_visit_id },

                    success: function (data) 
                    {
                        //alert("Success 1: " + data);

                        var res = data.split("~~");
                        $("#visit_date").val(res[0]);
                        $("#schedule").val(res[1]);
                        $("#complaints").val(res[2]);  
                        $("#weight").val(res[3]);
                        $("#bp").val(res[4]);
                        $("#oe").val(res[5]);

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
                    url: 'database/ajax/Get_op_visit_up.php',
                    type: 'GET',							
                    data: { process: "getSelected_medicine_prescription_data", op_visit_id:op_visit_id },

                    success: function (data) 
                    {
                      //alert("Success : " + data);
                        // var res = data.split("~~")
                        $("#medicine_prescriptions").html(data); // to set fetched data

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
                    url: 'database/ajax/Get_op_visit_up.php',
                    type: 'GET',							
                    data: { process: "getSelected_LS_prescription_data", op_visit_id:op_visit_id },

                    success: function (data) 
                    {
                      //alert("Success : " + data);
                        
                        $("#life_style_prescriptions").html(data); // to set fetched data

                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
           
        }
