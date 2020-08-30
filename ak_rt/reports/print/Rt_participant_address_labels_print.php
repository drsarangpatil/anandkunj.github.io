<!DOCTYPE html>
<html lang="en">
    <head>
        <title>RT Address Label</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../../ak_com/assets/css/bootstrap.3.4.1.min.css">
        <script src="../../../ak_com/assets/js/jquery.3.3.1.min.js"></script>
        <script src="../../../ak_com/assets/js/bootstrap.3.4.1.min.js"></script>
        <link rel="shortcut icon" type="image/png" href="../../../ak_com/assets/images/A_Logo_32x32.png">
        <link href="labels.css" rel="stylesheet" type="text/css">
        
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
        
    <!--<link rel="stylesheet" href="../../../ak_com/assets/css/page_setup.css">-->
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
        
<!-- Php code Starts =============================== -->
                <?php 
                    include( "../../database/Config.php");
                    $data = new myConfig();

                    $retStr = "";
                    try
                    {
                        $con = mysqli_connect($data->host, $data->user, $data->password,$data->db);
                        if (!$con)
                            echo(' Could not connect: ' . mysql_error());
                        else
                        {
                            mysqli_set_charset( $con, 'utf8' );
                            
                            $qryPr="SELECT c.rt_case_sheet_id, p.full_name, p.address, p.at_post, p.pin_code, p.state_name, p.mobile_no, p.email FROM ak_p_registration p, ak_rt_case_sheet c WHERE p.person_id= c.person_id ";
                            $qryPr=$qryPr . " and c.rt_case_sheet_id = ". $_GET["csid"];
                             
                            //echo $qryPr;
                            
                            {
                                $resPr = mysqli_query($con, $qryPr);
                                $recordPr = mysqli_fetch_array($resPr);
                            }
                            
                        }
                    }
                   
                    catch(Exception $ex)
                    {
                        echo "<script language='javascript'>alert('Error in Reading data')</script>";
                    }
                    mysqli_close ($con);
                ?>
<!-- Php code Ends ========================================= -->
        <form action="" method="POST" class="form-inline">
            <div class="container col-sm-0">
            </div>
<!-- Fetched Personal Information ================================================== -->
                <div class="container col-sm-12">
                    <div class="panel-group">
				    <div class="media">
				        <div class="media-body" style="font-size:14px">
                           <div class="layout" style= "color:Black">
                                <p align="center">
                                <span> <b><?php echo $recordPr[1];?></b></span>
                                </p>
                                <p align="center"><span><?php echo $recordPr[2];?></span> <br>
                                    <span><b><?php echo $recordPr[3];?></b></span> -
                                    <!--<span><?php echo $recordPr[4];?></span>,-->
                                    <span><?php echo $recordPr[5];?></span>,
                                    <span>Mob:</span> <span><?php echo $recordPr[6];?></span>
                                    <!--<span><?php echo $recordPr[7];?></span>-->
                                </p>
                            </div>
                           <div class="layout" style= "color:Black">
                                <p align="center">
                                <span> <b><?php echo $recordPr[1];?></b></span>
                                </p>
                                <p align="center"><span><?php echo $recordPr[2];?></span> <br>
                                    <span><b><?php echo $recordPr[3];?></b></span> -
                                    <!--<span><?php echo $recordPr[4];?></span>,-->
                                    <span><?php echo $recordPr[5];?></span>,
                                    <span>Mob:</span> <span><?php echo $recordPr[6];?></span>
                                    <!--<span><?php echo $recordPr[7];?></span>-->
                                </p>
                            </div>
                            <div class="layout" style= "color:Black">
                                <p align="center">
                                <span> <b><?php echo $recordPr[1];?></b></span>
                                </p>
                                <p align="center"><span><?php echo $recordPr[2];?></span> <br>
                                    <span><b><?php echo $recordPr[3];?></b></span> -
                                    <!--<span><?php echo $recordPr[4];?></span>,-->
                                    <span><?php echo $recordPr[5];?></span>,
                                    <span>Mob:</span> <span><?php echo $recordPr[6];?></span>
                                    <!--<span><?php echo $recordPr[7];?></span>-->
                                </p>
                            </div>
                            <div class="layout" style= "color:Black">
                                <p align="center">
                                <span> <b><?php echo $recordPr[1];?></b></span>
                                </p>
                                <p align="center"><span><?php echo $recordPr[2];?></span> <br>
                                    <span><b><?php echo $recordPr[3];?></b></span> -
                                    <!--<span><?php echo $recordPr[4];?></span>,-->
                                    <span><?php echo $recordPr[5];?></span>,
                                    <span>Mob:</span> <span><?php echo $recordPr[6];?></span>
                                    <!--<span><?php echo $recordPr[7];?></span>-->
                                </p>
                            </div>
                            <div class="layout" style= "color:Black">
                                <p align="center">
                                <span> <b><?php echo $recordPr[1];?></b></span>
                                </p>
                                <p align="center"><span><?php echo $recordPr[2];?></span> <br>
                                    <span><b><?php echo $recordPr[3];?></b></span> -
                                    <!--<span><?php echo $recordPr[4];?></span>,-->
                                    <span><?php echo $recordPr[5];?></span>,
                                    <span>Mob:</span> <span><?php echo $recordPr[6];?></span>
                                    <!--<span><?php echo $recordPr[7];?></span>-->
                                </p>
                            </div>
                           <div class="layout" style= "color:Black">
                                <p align="center">
                                <span> <b><?php echo $recordPr[1];?></b></span>
                                </p>
                                <p align="center"><span><?php echo $recordPr[2];?></span> <br>
                                    <span><b><?php echo $recordPr[3];?></b></span> -
                                    <!--<span><?php echo $recordPr[4];?></span>,-->
                                    <span><?php echo $recordPr[5];?></span>,
                                    <span>Mob:</span> <span><?php echo $recordPr[6];?></span>
                                    <!--<span><?php echo $recordPr[7];?></span>-->
                                </p>
                            </div>
                            <div class="layout" style= "color:Black">
                                <p align="center">
                                <span> <b><?php echo $recordPr[1];?></b></span>
                                </p>
                                <p align="center"><span><?php echo $recordPr[2];?></span> <br>
                                    <span><b><?php echo $recordPr[3];?></b></span> -
                                    <!--<span><?php echo $recordPr[4];?></span>,-->
                                    <span><?php echo $recordPr[5];?></span>,
                                    <span>Mob:</span> <span><?php echo $recordPr[6];?></span>
                                    <!--<span><?php echo $recordPr[7];?></span>-->
                                </p>
                            </div>
                            <div class="layout" style= "color:Black">
                                <p align="center">
                                <span> <b><?php echo $recordPr[1];?></b></span>
                                </p>
                                <p align="center"><span><?php echo $recordPr[2];?></span> <br>
                                    <span><b><?php echo $recordPr[3];?></b></span> -
                                    <!--<span><?php echo $recordPr[4];?></span>,-->
                                    <span><?php echo $recordPr[5];?></span>,
                                    <span>Mob:</span> <span><?php echo $recordPr[6];?></span>
                                    <!--<span><?php echo $recordPr[7];?></span>-->
                                </p>
                            </div>
                           <div class="layout" style= "color:Black">
                                <p align="center">
                                <span> <b><?php echo $recordPr[1];?></b></span>
                                </p>
                                <p align="center"><span><?php echo $recordPr[2];?></span> <br>
                                    <span><b><?php echo $recordPr[3];?></b></span> -
                                    <!--<span><?php echo $recordPr[4];?></span>,-->
                                    <span><?php echo $recordPr[5];?></span>,
                                    <span>Mob:</span> <span><?php echo $recordPr[6];?></span>
                                    <!--<span><?php echo $recordPr[7];?></span>-->
                                </p>
                            </div>
                           <div class="layout" style= "color:Black">
                                <p align="center">
                                <span> <b><?php echo $recordPr[1];?></b></span>
                                </p>
                                <p align="center"><span><?php echo $recordPr[2];?></span> <br>
                                    <span><b><?php echo $recordPr[3];?></b></span> -
                                    <!--<span><?php echo $recordPr[4];?></span>,-->
                                    <span><?php echo $recordPr[5];?></span>,
                                    <span>Mob:</span> <span><?php echo $recordPr[6];?></span>
                                    <!--<span><?php echo $recordPr[7];?></span>-->
                                </p>
                            </div>
                            <div class="layout" style= "color:Black">
                                <p align="center">
                                <span> <b><?php echo $recordPr[1];?></b></span>
                                </p>
                                <p align="center"><span><?php echo $recordPr[2];?></span> <br>
                                    <span><b><?php echo $recordPr[3];?></b></span> -
                                    <!--<span><?php echo $recordPr[4];?></span>,-->
                                    <span><?php echo $recordPr[5];?></span>,
                                    <span>Mob:</span> <span><?php echo $recordPr[6];?></span>
                                    <!--<span><?php echo $recordPr[7];?></span>-->
                                </p>
                            </div>
                            <div class="layout" style= "color:Black">
                                <p align="center">
                                <span> <b><?php echo $recordPr[1];?></b></span>
                                </p>
                                <p align="center"><span><?php echo $recordPr[2];?></span> <br>
                                    <span><b><?php echo $recordPr[3];?></b></span> -
                                    <!--<span><?php echo $recordPr[4];?></span>,-->
                                    <span><?php echo $recordPr[5];?></span>,
                                    <span>Mob:</span> <span><?php echo $recordPr[6];?></span>
                                    <!--<span><?php echo $recordPr[7];?></span>-->
                                </p>
                            </div>
                            <div class="layout" style= "color:Black">
                                <p align="center">
                                <span> <b><?php echo $recordPr[1];?></b></span>
                                </p>
                                <p align="center"><span><?php echo $recordPr[2];?></span> <br>
                                    <span><b><?php echo $recordPr[3];?></b></span> -
                                    <!--<span><?php echo $recordPr[4];?></span>,-->
                                    <span><?php echo $recordPr[5];?></span>,
                                    <span>Mob:</span> <span><?php echo $recordPr[6];?></span>
                                    <!--<span><?php echo $recordPr[7];?></span>-->
                                </p>
                            </div>
                            <div class="layout" style= "color:Black">
                                <p align="center">
                                <span> <b><?php echo $recordPr[1];?></b></span>
                                </p>
                                <p align="center"><span><?php echo $recordPr[2];?></span> <br>
                                    <span><b><?php echo $recordPr[3];?></b></span> -
                                    <!--<span><?php echo $recordPr[4];?></span>,-->
                                    <span><?php echo $recordPr[5];?></span>,
                                    <span>Mob:</span> <span><?php echo $recordPr[6];?></span>
                                    <!--<span><?php echo $recordPr[7];?></span>-->
                                </p>
                            </div>
                            <div class="layout" style= "color:Black">
                                <p align="center">
                                <span> <b><?php echo $recordPr[1];?></b></span>
                                </p>
                                <p align="center"><span><?php echo $recordPr[2];?></span> <br>
                                    <span><b><?php echo $recordPr[3];?></b></span> -
                                    <!--<span><?php echo $recordPr[4];?></span>,-->
                                    <span><?php echo $recordPr[5];?></span>,
                                    <span>Mob:</span> <span><?php echo $recordPr[6];?></span>
                                    <!--<span><?php echo $recordPr[7];?></span>-->
                                </p>
                            </div>
                            <div class="page-break"></div>
                            </div>
						  </div>
						</div>
                     </div>
            
<!-- Fetched Personal Information Pannel end ================================================== -->
            <div class="container col-sm-0">
            </div>
           
        </form>
    </page>
    </body>
</html>