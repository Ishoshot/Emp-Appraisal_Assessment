<?php 
require_once 'core/init.php';
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>APPRAISAL - COMPLAINTS</title>
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
<?php
     
  $user = new User();
  $title = escape($user->data()->title); 
  $key = escape($user->data()->title) ." ". escape($user->data()->surname)." ". escape($user->data()->firstname);
  $surname = escape($user->data()->surname); 
  $firstname = escape($user->data()->firstname);
  $photo = escape($user->data()->photo);
  $users_id = escape($user->data()->users_id);

  if ($user->isLoggedIn()) {

    if ($user->hasPermission('admin')) {
       Redirect::to('admin.php');
    }
    elseif (!$user->hasPermission('admin') && !$user->data()->group == '3' && !$user->data()->opt == 'lecturer'){
       Redirect::to('welcome.php');
    }
     
?>

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

        <span class="logout-spn">
          <a href="logout.php" style="color:#fff; font-size:20px;">LOGOUT <i class="fa fa-sign-out"></i></a>  
        </span>

    </div>
  </div>
<!-- /. NAV TOP  -->
      
      <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
      <ul class="nav" id="main-menu">
          <li>
            <a href="lecturer.php?user=<?php echo $users_id; ?>" ><i class="fa fa-desktop"></i>Dashboard</a>
          </li>
          
          <li>
            <a href="appraisals.php?user=<?php echo $users_id; ?>" ><i class="fa fa-eye"></i>View Appraisals</a>
          </li>

          <li class="active-link">
            <a href="complaints.php?user=<?php echo $users_id; ?>" ><i class="fa fa-eye"></i>View Complaints</a>
          </li>

          <li>
            <a href="lprofile.php?user=<?php echo $users_id; ?>" ><i class="fa fa-user"></i>View Profile</a>
          </li>
      </ul>
      </div>
      </nav>
        <!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
        
        <div class="row text-center" style="margin-top:1%;">
          <div class="col-md-6">
            <?php $Rphoto = "<img src='profile/".$photo."' style='width:35px; height:35px;border-radius:50%;'>"; ?>
            <h3 style=""><?php echo $Rphoto." ". $title." ". $surname." ". $firstname; ?></h3>
          </div>
          <div class="col-md-6">
            <h3><a href="picture.php?user=<?php echo $users_id; ?>">Change Profile Picture ?</a></h3>
          </div>
        </div>              
       
      <hr/>
      
      <?php if (Session::exists('home')) { ?>
      <div class="row">
        <div class="col-lg-12 ">
          <div class="alert alert-info">
            <i class="fa fa-volume-up"></i>
               <?php echo Session::flash('home'); ?>
          </div> 
        </div>
      </div>
      <?php
        }
      ?>


    <div class="row" style="margin-top:6%;">
      <div class="col-md-12 text-center">
      <?php 
      $sql = DB::getInstance()->query("SELECT * FROM complaints WHERE lecturer = '$key' ORDER BY c_id desc");

      if ($sql->count($sql)) 
      { ?> 
        <table class="table table-striped table-bordered text-center">
          <tr>
            <th style="text-align:center;">CATEGORY</th>
            <th style="text-align:center;">LEVEL</th>
            <th style="text-align:center;">AUTHOR</th>
            <th style="text-align:center;">DATE</th>
            <th style="text-align:center;">OPTION</th>
          </tr>
        <?php
        foreach ($sql->results() as $sql) {?>
         <tr>
            <td>
            <?php echo $sql->category;?>
            </td>
            
            <td>
            <?php echo $sql->level;?>
            </td>

            <td>
            <?php echo $sql->mode;?>
            </td>

            <td>
            <?php echo $sql->date;?>
            </td>

            <td>
            <a href="complaintsview.php?id=<?php echo $sql->c_id; ?>">
              <span class="badge btn btn-primary">
                <i class="fa fa-eye"> View</i>
              </span>
            </a>
            </td>

          </tr>

        <?php
        }
        }
        else {
          ?>
              <div class="alert alert-danger">
                  <p>Dear <b><?php echo $key; ?></b>, YOU DO NOT HAVE ANY COMPLAINTS YET !!!<br/> <b>Only Successfully Submitted Complaints involving <u>You</u> will Appear here</b></p>
              </div>
          
        <?php
        }

        ?>
      </table>

        </div>
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
          
<?php

}

else

{

  redirect::to('login.php');

}

?>


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
