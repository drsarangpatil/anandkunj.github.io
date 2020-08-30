 
$(document).ready
(
function () 
{	
    //alert ("ABC");
    $.ajax
        (
            {
                url: 'database/ajax/Get_rt_room_allocation.php',
                type: 'GET',				
                data: { process: "getRt_room_allocation_records"},

                success: function (data) 
                {
                   //alert("Success 3: " + data);

                   $("#all_rt_room_allocation_records").html(data);


                    },
                   error:function (data) 
                    {
                        alert("Error : " + data);
                    },
                }

            );
    $.ajax
    (
        {
            url: 'database/ajax/Get_rt_room_allocation.php',	// call page for data to be retrived
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
                url: 'database/ajax/Get_rt_room_allocation.php',
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
                            url: 'database/ajax/Get_rt_room_allocation.php',
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
                                            url: 'database/ajax/Get_rt_room_allocation.php', 
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
                                                            url: 'database/ajax/Get_rt_room_allocation.php', 
                                                            type: 'GET',							
                                                            data: { process: "getSelected_rt_attendant_info_record", rt_case_sheet_id:response[0]},

                                                            success: function (data) 
                                                            {
                                                                //alert("Success 1: " + data);

                                                                var res = data.split("~~"); 

                                                                $("#no_attendant").val(res[0]);  
                                                                $("#attendant_name1").val(res[1]);
                                                                $("#attendant_name2").val(res[2]);
                                                       
                                                           
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

    /*function myshow()
        {

            //var rt_case_sheet_id = $('#rt_case_sheet_id').val();
            var rt_room_allocation_id = $('#rt_room_allocation_id').val();
            //alert(rt_room_allocation_id);
            $.ajax
            (
                {
                    url: 'database/ajax/Get_rt_room_allocation.php',// call page for data to be retrived
                    type: 'GET',							     // to get data in backgrouond
                    data: { process: "getSelected_Rt_room_allocation_record", rt_room_allocation_id:rt_room_allocation_id},	
                    // what exactly we have retrive other details

                    success: function (data) 
                    {
                        //alert("Success : " + data);

                        var res = data.split("~~"); // to split the fetched data

                        $("#p_type").val(res[0]);
                        $("#building_name").val(res[1]);
                        $("#building_namea").val(res[1]);
                        $('#building_name').trigger('change');
                        $("#room_numbera").val(res[2]);
                        $("#bed_numbera").val(res[3]);
                        $("#room_status").val(res[4]);  // to set fetched data
                        
                        
                        
                        
                        
                       
                        
                        
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
            
        }
*/
