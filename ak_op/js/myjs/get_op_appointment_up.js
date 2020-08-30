 
$(document).ready
(
function () 
{	
    //alert ("ABC");
    $.ajax
        (
            {
                url: 'database/ajax/Get_op_appointment_up.php',
                type: 'GET',				
                data: { process: "getAll_op_appointment_records"},

                success: function (data) 
                {
                   //alert("Success 3: " + data);

                   $("#all_op_appointment_records").html(data);


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
            var op_ap_id = $('#op_ap_id').val();
            //alert(op_ap_id);
            
            $.ajax
            (
                {
                    url: 'database/ajax/Get_op_appointment_up.php',// call page for data to be retrived
                    type: 'GET',							     // to get data in backgrouond
                    data: { process: "getSelected_Op_appointment_record", op_ap_id:op_ap_id},	
                    // what exactly we have retrive other details

                    success: function (data) 
                    {
                        //alert("Success : " + data);

                        var res = data.split("~~"); // to split the fetched data

                        $("#ap_date").val(res[0]);
                        $("#ap_session").val(res[1]);
                        $("#ap_time").val(res[2]);
                        $("#ap_type").val(res[3]);
                        $("#ap_with").val(res[4]);
                        $("#ap_purpose").val(res[5]);
                        $("#ap_status").val(res[6]);
                        $("#full_name").val(res[7]);
                        $("#age").val(res[8]);
                        $("#gender").val(res[9]);
                        $("#at_post").val(res[10]);
                        $("#mobile_no").val(res[11]);
                        $("#email").val(res[12]);
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
            
        }

