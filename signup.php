<?php 
require_once 'core/init.php';
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REGISTRATION</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>

<div id="wrapper">
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="adjust-nav">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="navbar-brand" href="#">
              <img src="assets/img/nacoss.png" style="width:60px; height:60px;" />
          </a>
      </div>

        <!-- <span class="logout-spn">
          <a href="#" style="color:#fff; font-size:20px;">LOGOUT <i class="fa fa-sign-out"></i></a>  
        </span> -->

    </div>
  </div>
<!-- /. NAV TOP  -->
      
      <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
      <ul class="nav" id="main-menu">
          
        <li class="active-link">
          <a href="signup.php"><i class="fa fa-circle-o "></i>Complete to Register</a>
        </li>

        <li>
            <a href="login.php"><i class="fa fa-home "></i>Login to Proceed</a>
        </li>        
          
      </ul>
      </div>
      </nav>
        <!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
        
        <div class="row">
          <div class="col-lg-12">
            <h3 style="text-align:center;">COMPLETE TO REGISTER</h3>   
          </div>
        </div>   
     
         <hr/>
         
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8 jumbotron" style="padding:30px; margin-top:4%;border-radius:10px;">
     
      <form action="" method="POST">
        
        <?php require 'regprocess.php'; ?>
        
        <div class="form-group">
          <input type="hidden" style="padding:18px;" class="form-control" placeholder="I would Enter My Username here"  name="username" autocomplete="off" required>
        </div>

        <div class="form-group">
          <input type="hidden" style="padding:18px;" class="form-control" placeholder="It is Considered Private" name="password" autocomplete="off" required>
        </div>

        <div class="form-group">
          <label>SURNAME <span style="color:red;">*</span></label>
          <input type="text" style="padding:18px;" class="form-control" placeholder="Enter Your Surname"  name="surname" autocomplete="off" required>
        </div>


        <div class="form-group" style="margin-top:2%;">
          <label>FIRSTNAME <span style="color:red;">*</span></label>
          <input type="text" style="padding:18px;" class="form-control" placeholder="Enter Your Firstname"  name="firstname" autocomplete="off" required>
        </div>

        <div class="form-group" style="margin-top:2%;">
          <label>MATRIC NUMBER <span style="color:red;">*</span></label>
          <input type="text" style="padding:18px;" class="form-control" placeholder="Enter Your Matric Number"  name="matric" autocomplete="off" required>
        </div>


        <div class="form-group" style="margin-top:2%;">
          <label>EMAIL ADDRESS <span style="color:red;">*</span></label>
          <input type="text" style="padding:18px;" class="form-control" placeholder="Enter Your Valid Email Address"  name="email" autocomplete="off" required>
        </div>


        <div class="form-group" style="margin-top:2%;">
          <label>PHONE NUMBER <span style="color:red;">*</span></label>
          <input type="text" style="padding:18px;" class="form-control" placeholder="Enter Your Phone Number"  name="phone" autocomplete="off" required>
        </div>

        <div class="form-group" style="margin-top:2%;">
          <label>DEPARTMENT <span style="color:red;">*</span></label>
          <input type="text" style="padding:18px;" class="form-control" placeholder="Enter Your Department"  name="department" value="Computer Science" autocomplete="off" required readonly>
        </div>        

        <div class="form-group" style="margin-top:2%;">
          <label>LEVEL <span style="color:red;">*</span></label>
          <select class="form-control" name="level">
            <option>~ Please Select ~</option>
            <option value="ND I">ND I</option>
            <option value="ND II">ND II</option>
            <option value="HND I">HND I</option>
            <option value="HND II">HND II</option>
          </select>
        </div>

        <div class="col-md-12">
          <input type="checkbox"> Agree to terms and Conditions ?
        </div>
        
        <div class="form-group">
        <input type="hidden" class="form-control" name="token" value="<?php echo Token::generate();?>">
        </div>
        
        <div class="row text-center" style="margin-top:10%;">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <input type="submit" class="btn btn-success btn-lg" value="Complete">
          </div>
          <div class="col-md-4"></div>
        </div>

        <div class="col-md-12 text-center" style="margin-top:4%;">
          <p style="font-size:15px; font-variant:small-caps;font-weight:bold;">Already have an Account? <a href="login.php">Sign In</a></p>
        </div>

      </form>
  </div>
  <div class="col-md-2"></div>
</div>


  </div> <!-- /. PAGE INNER  -->
</div><!-- /. PAGE WRAPPER  -->

</div><!-- /. PAGE WRAPPER 2  -->





<!-- FOOTER HERE -->

<div class="footer">
    <div class="row">
        <div class="col-lg-12 text-center">
            &copy; 2019 All Rights Reserved | Powered by <a href="#">TobbyWeb</a>
        </div>
    </div>
</div>
          


<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>
    
   
</body>
</html>
