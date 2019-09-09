<?php 
require_once 'core/init.php';
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In to Continue..</title>
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

       <!--  <span class="logout-spn">
          <a href="#" style="color:#fff; font-size:20px;">LOGOUT <i class="fa fa-sign-out"></i></a>  
        </span> -->

    </div>
  </div>
<!-- /. NAV TOP  -->
      
      <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
      <ul class="nav" id="main-menu">
          
        <li class="active-link">
            <a href="login.php" ><i class="fa fa-home "></i>Login to Proceed</a>
        </li>
        
        <li>
          <a href="signup.php" ><i class="fa fa-circle-o "></i>Complete to Register</a>
        </li>

      </ul>
      </div>
      </nav>
        <!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
        
        <div class="row">
          <div class="col-lg-12">
            <h3 style="text-align:center;">LOG IN TO CONTINUE</h3>   
          </div>
        </div>              
       
      <hr/>
      
      <div class="row">
        <div class="col-lg-12 ">
          <div class="alert alert-info">
            <i class="fa fa-volume-up"></i>
             <?php if (Session::exists('home')) {
                echo Session::flash('home');
                }
              ?>
          </div> 
        </div>
      </div>


<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8 jumbotron" style="padding:30px; margin-top:6%;border-radius:10px;">
<?php

    if (Input::exists()) {
        
        if (Token::check(Input::get('token'))) {
        
        $validate = new  Validate();
         $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
         ));

         if ($validation->passed()) {
            $user = new User();
            $remember =(Input::get('remember')==='on') ? true : false;
            $login = $user->login(Input::get('username'),  Input::get('password'), $remember);

            if($login)
            {

            if ($user->hasPermission('admin'))
            {
              Session::flash('home','You have Successfully Logged In');
              Redirect::to('admin.php');
            }
            elseif ($user->data()->group == '3'  && $user->data()->opt == 'lecturer') {
              Session::flash('home','You have Successfully Logged In');
              Redirect::to('lecturer.php');
            }
            else{
              Session::flash('home','You have Successfully Logged In');
              Redirect::to('welcome.php');
            }
                        

            }
            else
            {
                ?>   
                  <div class="alert alert-danger">
                    <?php echo '<p style="font-size:15px;"> Oops! Login Faled, Check your Details and Try Again </p>'; ?>
                  </div>
                <?php
            }

        }
     
    else
     
    {
        foreach ($validation->errors() as $error)
        {
           ?>   
            <div class="alert alert-danger">
              <?php echo $error, '<br>'; ?>
            </div>
            <?php                
        }
         
    }

    }

}

?>

      <form action="" method="post">
        
        <div class="form-group" style="margin-top:3%;">
          <label>USERNAME:</label>
          <input type="text" style="padding:18px;" class="form-control" placeholder="Same as your Registered Email Address"  name="username" autocomplete="off">
        </div>

        <div class="form-group" style="margin-top:3%;">
          <label>PASSWORD:</label>
          <input type="password" style="padding:18px;" class="form-control" placeholder="Same as your Matric Number/Identity Number" name="password" autocomplete="off">
        </div>

        <div class="col-md-12">
          <input type="checkbox" name="remember" id="remember"> Remember me
        </div>
        
        <input type="hidden" name="token" value="<?php echo Token::generate();?>">

        <div class="row text-center" style="margin-top:5%;">
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <input type="submit" class="btn btn-success btn-lg" value="Log In">
          </div>
          <div class="col-md-4"></div>
        </div>

        <div class="col-md-12 text-center" style="margin-top:4%;">
          <p style="font-size:15px; font-variant:small-caps;font-weight:bold;">Are you a Student? <a href="signup.php">Register</a></p>
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
