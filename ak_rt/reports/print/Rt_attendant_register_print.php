<html lang="en">
    <head>
        <title> Print Attendant Register</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../../ak_com/assets/css/bootstrap.3.4.1.min.css">
        <script src="../../../ak_com/assets/js/jquery.3.3.1.min.js"></script>
        <script src="../../../ak_com/assets/js/bootstrap.3.4.1.min.js"></script>
        <link rel="shortcut icon" type="image/png" href="../../../ak_com/assets/images/A_Logo_32x32.png">
        
    <link rel="stylesheet" href="../../../ak_com/assets/css/page_setup.css">
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

                $qryOrg="SELECT  logo, org_slogan, main_name,  address, residence_phone1, website FROM ak_organization_info WHERE org_id=1";

                //echo $qryOrg;

                $resOrg = mysqli_query($con, $qryOrg);
                $recordOrg = mysqli_fetch_array($resOrg); 
            }
        ?>
<!-- Php code for Header Ends =============================== -->
        <form action="" method="POST" class="form-inline" >
            <div class="container col-sm-0">
            </div>
                <div class="container col-sm-12">
<!-- Document Header Start ================================================== -->
                <table width="100%" class="table table-striped table-bordered table-hover" 
                    id="cs_table" >
                        <tr align="center">
                            <td width="15%" align="center">
                                <a class="pull-center" href="#">
                                <img id="logo" name="logo" class="img-rounded"  width="100" height="100" src="../../../ak_com/database/logos/<?php echo $recordOrg[0];?>"   alt="logo not found>">
                                </a>
                            </td>
                            <td width="85%" align="center">
                                <h6 Style= color:orange align="center"><i> <?php echo $recordOrg[1];?></i></h6>
                                <h2 Style= color:slateBlue align="center"><b> <?php echo $recordOrg[2];?></b></h2>
                                 <h6 Style= color:orange align="center"> <?php echo $recordOrg[3];?>,  Phone: <?php echo $recordOrg[4];?>, <?php echo $recordOrg[5];?></h6>
                            </td>
                        </tr>
                </table>
<!-- Document Header End ================================================== --> 
                <h5 align="center"><b> RT Attendant Register</b></h5>
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" 
                        id="dataTables-example">
                        <thead>
                            <tr style="font-size:13px">
                                <th>#</th>
                                <th>ID</th>
                                <th>DOA</th>
                                <th>DOC</th>
                                <th>R Du</th>
                                <th>Photo</th>
                                <th>Full Name</th>
                                <th>At Post</th>
                                <th>Mobile</th>
                                <th>1st Attendant</th>
                                <th>2nd Attendant</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
<!-- Php code for OP Case Sheet Table Starts =============================== -->
                            <?php 
                                $retStr = "";
                                try
                                {
                                    {
                                        $query="SELECT a.rt_attendant_info_id, c.doa, c.doc, c.retreat_duration, c.retreat_name, p.photo, p.full_name, p.at_post, p.mobile_no, c.ad_status FROM ak_p_registration p, ak_rt_case_sheet c, ak_rt_attendant_info a WHERE p.person_id= c.person_id ";
                                        $query = $query . " and c.rt_case_sheet_id =a.rt_case_sheet_id";


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

                                       $i =1;
                                        while($record = mysqli_fetch_array($response))
                                        {

                                             echo '<tr class="odd gradeX" style="font-size:13px" >';
                                                echo '<td align="left">' . $i . '</td>';
                                                echo '<td align="left">' . $record[0] . '</td>';
                                                echo '<td align="left">' . $record[1] . '</td>';
                                                echo '<td align="left">' . $record[2] . '</td>';
                                                echo '<td align="left">' . $record[3] . '</td>';
                                                /*echo '<td align="left">' . $record[4] . '</td>';*/
                                                
                                                echo '<td align="left"><img width="30" height="40" class="img-rounded" src="../../../ak_com/database/photos/'. $record[5] .'">  </td>';
                                                echo '<td align="left">' . $record[6] . '</td>';
                                                 
                                                echo '<td align="left">' . $record[7] . '</td>';
                                            
                                                echo '<td  align="left">' . $record[8] . '</td>';
                                            
                                                $qryAtn="SELECT attendant_name1, relation1, mobile_no1  FROM ak_rt_attendant_info WHERE rt_attendant_info_id ='" . $record[0] ."' ";
                                            
                                                $resAtn = mysqli_query($con, $qryAtn);
                                                $atn1="";
                                                while($recordAtn = mysqli_fetch_array($resAtn))
                                                {
                                                    $atn1 =  $atn1.$recordAtn[0] . ' (' . $atn1.$recordAtn[1] . ')</br>' . $atn1.$recordAtn[2] . '</br>';
                                                }
                                                /*$atn1=substr( $atn1,0,strlen($atn1)-2);*/
                                                /*echo '<td align="left">' . $atn1 . '</td>';*/
                                                echo '<td align="left">' . $atn1 . '</td>';
                                                
                                                $qryAtn="SELECT attendant_name2, relation2, mobile_no2 FROM ak_rt_attendant_info WHERE rt_attendant_info_id ='" . $record[0] ."' ";
                                            
                                                $resAtn = mysqli_query($con, $qryAtn);
                                                $atn2="";
                                                while($recordAtn = mysqli_fetch_array($resAtn))
                                                {
                                                    $atn2 =  $atn2.$recordAtn[0] . ' (' . $atn2.$recordAtn[1] . ')</br>' . $atn2.$recordAtn[2] . '</br>';
                                                }
                                                /*$atn2=substr( $atn2,0,strlen($atn2)-2);*/
                                                /*echo '<td align="left">' . $atn2 . '</td>';*/
                                                echo '<td align="left">' . $atn2 . '</td>';
                                            
                                                echo '<td align="left">' . $record[9] . '</td>';
                                            echo "</tr>";
                                            $i = $i+1;
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
                        </tbody>
                    </table>
                     <!--<td><a href="../Rt_cs_register.php">Back</a></td> -->
                    </div>
                    </div>
                <div class="container col-sm-0">
            </div>
        </form>
    </page>
    </body>
</html>
