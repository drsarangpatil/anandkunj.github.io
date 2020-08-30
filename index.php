<?php
if(session_id() == '') 
    session_start();
?>
<?php include'./ak_com/assets/index_header.php'; ?>

<title>Login</title>
</head> 

<body>
<div class="container col-sm-10">
<form action="Login.php" method="POST" class="form-inline" >
        
<!-- Carousel=========================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="./ak_com/database/logos/P18405601.jpg" alt="First slide">
          <!--<div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p style= color:orange align="center"><i> <?php echo $recordOrg[1];?></i></p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
          </div>-->
        </div>
        <div class="item">
          <img class="second-slide" src="./ak_com/database/logos/P1840360.jpg" alt="Second slide">
          <div class="container">
            <!--<div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>-->
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="./ak_com/database/logos/P1840579.jpg" alt="Third slide">
          <div class="container">
            <!--<div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>-->
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
<!-- /.carousel -->

<!--Login Information ================================================== -->
            <div class="panel-group">
                  <h5 Style= color:slateBlue align="left"><b>Please Login</b></h5>
                <div class="panel panel-primary">
                <!--<div class="panel-heading" align="center" style="font-size:20px">
                    Please Login                 
                    </div>-->
                    <div class="panel-body">
                         <div class="form-group col-sm-5">
                            <label>User ID:</label>
                                <div class="form-group">
                                 <input type="text" class="form-control"
                                    id="user_id" name="user_id" placeholder="User Name"required> 
                            </div>
                        </div>                        
                        <div class="form-group col-sm-5">
                            <label>Password:</label>
                                <div class="form-group">
                                <input type="password" class="form-control"
                                   id="password" name="password"
                                   placeholder="Password"required>
                              </div>
                       </div>
                        <div class="form-group col-sm-2 pull-right">
                            <label></label>
                            <div class="form-group" >
                                <button type="submit" class="btn btn-primary">Login</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                            </div>
                        </div>
                       </div>
                    </div>
                </div>
<!--Login Information ends ========================================= -->
        </form>
        <?php include'./ak_com/assets/index_footer.php'; ?>
    </div>
            <div class="container col-sm-1">
            </div>
        
</body>
</html>