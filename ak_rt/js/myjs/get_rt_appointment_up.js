 
$(document).ready
(
function () 
{	
    //alert ("ABC");
    $.ajax
        (
            {
                url: 'database/ajax/Get_rt_appointment_up.php',
                type: 'GET',				
                data: { process: "getAll_rt_appointment_records"},

                success: function (data) 
                {
                   //alert("Success 3: " + data);

                   $("#all_rt_appointment_records").html(data);


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
            var rt_ap_id = $('#rt_ap_id').val();
            //alert(rt_ap_id);
            
            $.ajax
            (
                {
                    url: 'database/ajax/Get_rt_appointment_up.php',// call page for data to be retrived
                    type: 'GET',							     // to get data in backgrouond
                    data: { process: "getSelected_Rt_appointment_record", rt_ap_id:rt_ap_id},

                    success: function (data) 
                    {
                        //alert("Success : " + data);

                        var res = data.split("~~"); // to split the fetched data

                        $("#ar_date").val(res[0]);
                        $("#ar_session").val(res[1]);
                        $("#ar_time").val(res[2]);
                        $("#st_days").val(res[3]);
                        $("#tr_mode").val(res[4]);
                        $("#ad_type").val(res[5]);
                        $("#rm_expected").val(res[6]);
                        $("#ad_purpose").val(res[7]);
                        $("#ad_status").val(res[8]);
                        $("#full_name").val(res[9]);
                        $("#age").val(res[10]);
                        $("#gender").val(res[11]);
                        $("#at_post").val(res[12]);
                        $("#mobile_no").val(res[13]);
                        $("#email").val(res[14]);
                    },
                    error:function (data) 
                    {
                        alert("Error : " + data);				// if error alert message
                    },
                }

            );
            
        }

