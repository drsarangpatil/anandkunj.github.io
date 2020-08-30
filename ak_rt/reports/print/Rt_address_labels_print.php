<html lang="en">
    <head>
        <title> Print RT Address Labels</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../../ak_com/assets/css/bootstrap.3.4.1.min.css">
        <script src="../../../ak_com/assets/js/jquery.3.3.1.min.js"></script>
        <script src="../../../ak_com/assets/js/bootstrap.3.4.1.min.js"></script>
        <link rel="shortcut icon" type="image/png" href="../../../ak_com/assets/images/A_Logo_32x32.png">

        <!--CSS for address labels-->    
        <style>
            body {
                /*width: 21cm;
                height: 29.7cm;*/
                width: 9.5in;
                margin: 0in .1875in;
                }
            .layout{
                /* Avery 5160 labels -- CSS and HTML */
                width: 3.025in; /* plus .6 inches from padding */
                /*height: 1.875in;*/ /* plus .125 inches from padding */
                height: 1.475in;
                padding: .125in .125in 0;
                margin-right: .025in; /* the gutter */

                float: left;

                text-align: center;
                overflow: hidden;

                outline: 1px dotted; /* outline doesn't occupy space like border does */
                }
            .page-break  {
                clear: left;
                display:block;
                page-break-after:always;
                }

            @media print {
              #printPageButton {
                display: none;
              }
            }
          </style>
        
    <link rel="stylesheet" href="../../../ak_com/assets/css/page_setup_address.css">
    </head>
    <body>
    <!--JS for print button-->
    <script>
        function myprint() {
          window.print();
        }
    </script>
        
    <button id="printPageButton" onClick="window.print();">Print</button>
    <page size="A4">
        
<!-- Php code for Header Starts =============================== -->
        <?php
            //create connection
            include_once('../../database/Config.php');
            $data = new myConfig();

            $con = mysqli_connect($data->host, $data->user,$data->password,$data->db);
            //confirm connection
            if ($con)
            {
                //echo "1";
                mysqli_set_charset( $con, 'utf8' );

                /*$qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=1";

                //echo $qryOrg;

                $resOrg = mysqli_query($con, $qryOrg);
                $recordOrg = mysqli_fetch_array($resOrg);*/ 
            }
        ?>
<!-- Php code for Header Ends =============================== -->
        <form action="" method="POST" class="form-inline" >
            <div class="container col-sm-0">
            </div>
                <div class="container col-sm-12">
<!-- Document Header Start ================================================== -->
                <!--<table width="100%" class="table table-striped table-bordered table-hover" 
                    id="cs_table" >
                        <tr align="center">
                            <td width="15%" align="center">
                                <a class="pull-center" href="#">
                                <img id="logo" name="logo" class="img-circle"  width="100" height="100" src="../../../ak_set/database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
                                </a>
                            </td>
                            <td width="85%" align="center">
                                <h6 Style= color:orange align="center"><i> <?php echo $recordOrg[1];?></i></h6>
                                <h2 Style= color:slateBlue align="center"><b> <?php echo $recordOrg[2];?></b></h2>
                                 <h6 Style= color:orange align="center"> <?php echo $recordOrg[3];?>,  Phone: <?php echo $recordOrg[4];?>, <?php echo $recordOrg[5];?></h6>
                            </td>
                        </tr>
                </table>-->
<!-- Document Header End ================================================== --> 
                <!--<h5 align="center"><b> RT Case Sheet Register</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px"> 
                                <th>#</th>
                                <th>ID</th>
                                <th>DOA</th>
                                <th>DOC</th>
                                <th>R Name</th>
                                <th>Photo</th>
                                <th>Full Name</th>
                                <th>Address</th>
                                <th>At Post</th>
                                <th>Mobile No.</th>
                                <th>Illness</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>-->
<!-- Php code for OP Case Sheet Table Starts =============================== -->
                            <?php 
                                $retStr = "";
                                try
                                {
                                    {
                                        $query="SELECT c.rt_case_sheet_id, p.full_name, p.address, p.at_post, p.pin_code, p.state_name, p.mobile_no FROM ak_p_registration p, ak_rt_case_sheet c WHERE p.person_id= c.person_id ";


                                        if( isset($_GET["from_date"]))
                                           if( $_GET["from_date"]!==""  &&  $_GET["to_date"]!=="" )
                                            {
                                                $query = $query .   " and  (c.doa between '".  $_GET["from_date"] . "' and '".  $_GET["to_date"] . "')"; 
                                            }

                                        if( isset($_GET["at_post"]))
                                            if( $_GET["at_post"]!=="")
                                            {
                                                $query = $query .   " and ( p.at_post ='".  $_GET["at_post"] . "')  "; 
                                            }
                                        if( isset($_GET["retreat_name"]))
                                            if( $_GET["retreat_name"]!=="")
                                            {
                                                $query = $query .   " and ( c.retreat_name ='".  $_GET["retreat_name"] . "')  "; 
                                            }
                                        if( isset($_GET["full_name"]))
                                            if( $_GET["full_name"]!=="")
                                            {
                                                $query = $query .   " and ( p.full_name ='".  $_GET["full_name"] . "')  "; 
                                            }
                                        if( isset($_GET["ad_status"]))
                                            if( $_GET["ad_status"]!=="")
                                            {
                                                $query = $query .   " and ( c.ad_status ='".  $_GET["ad_status"] . "')  "; 
                                            }

                                        //echo $query;

                                        $response = mysqli_query($con, $query);

                                       /*$i =1;*/
                                        while($record = mysqli_fetch_array($response))
                                        {
                                           echo ' <div class="layout" style= "color:Black">
                                                    <p align="center">
                                                    <span> <b>'. $record[1] .'</b></span>
                                                    </p>
                                                    <p align="center"><span>'. $record[2] .'</span>, 
                                                        <span><b>'. $record[3] .'</b></span>,
                                                        <span>'. $record[5] .'</span>,
                                                        <span>Mob:</span> <span>'. $record[6] .'</span>
                                                    </p>
                                                 </div>';
                                             
                                            /*$i = $i+1;*/
                                        }
                                       
                                    }
                                }
                                catch(Exception $ex)
                                {
                                    echo "<script language='javascript'>alert('Error in Reading data')</script>";
                                }
                            mysqli_close ($con);
                        ?>
<!-- Php code for OP Case Sheet Table ends =============================== -->
                       <!-- </tbody>
                    </table>-->
                     <!--<td><a href="../Rt_cs_register.php">Back</a></td> -->
                    <!--</div>-->
                    </div>
                <div class="container col-sm-0">
            </div>
        </form>
    </page>
    </body>
</html>
