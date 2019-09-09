<?php 
require_once 'core/init.php';
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>APPRAISAL - VIEW COMPLAINTS</title>
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
  $surname = escape($user->data()->surname); 
  $firstname = escape($user->data()->firstname);
  $photo = escape($user->data()->photo);
  $users_id = escape($user->data()->users_id);

  if ($user->isLoggedIn()) {

    if (!$user->hasPermission('admin')) {
       Redirect::to('welcome.php');
    }
    elseif (!$user->hasPermission('admin') && !$user->data()->group == '3' && !$user->data()->opt == 'lecturer'){
       Redirect::to('welcome.php');
    }

    $id = $_GET['id'];
    $sql = DB::getInstance()->query("SELECT * FROM complaints where c_id ='$id'");
    if ($sql->count()) {
     
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
            <a href="admin.php?user=<?php echo $users_id; ?>" ><i class="fa fa-desktop"></i>Dashboard</a>
          </li>
          
          <li>
            <a href="praises.php?user=<?php echo $users_id; ?>" ><i class="fa fa-eye"></i>View Appraisals</a>
          </li>

          <li class="active-link">
            <a href="admcomplaints.php?user=<?php echo $users_id; ?>" ><i class="fa fa-eye"></i>View Complaints</a>
          </li>

          <li>
            <a href="mgstudents.php?user=<?php echo $users_id; ?>" ><i class="fa fa-user"></i>Manage Students</a>
          </li>

          <li>
            <a href="mglecturers.php?user=<?php echo $users_id; ?>" ><i class="fa fa-user"></i>Manage Lecturers</a>
          </li>
      </ul>
      </div>
      </nav>
        <!-- /. NAV SIDE  -->

<div id="page-wrapper" >
  <div id="page-inner">
        
        <div class="row" style="margin-top:1%;">
          <div class="col-md-12">
            <?php $Rphoto = "<img src='profile/".$photo."' style='width:35px; height:35px;border-radius:50%;'>"; ?>
            <h3 style=""><?php echo $Rphoto ." ". $firstname; ?></h3>
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


    <div class="row" style="margin-top:2%;">
      
      <div class="col-md-1"></div>
      
      <div class="col-md-10 jumbotron" style="background-color:rgba(0,0,0,0.03); border-radius:20px;">
          
            <h2 class="text-center">Category : <?php echo $sql->first()->category;?></h2>
            <hr width="50%"> 
          
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
              <h3>Evidence: </h3>
                <img src="evidence/<?php echo $sql->first()->proof ?>" class="thumbnail" alt="NO EVIDENCE !!!" style="width:100%; height:auto;">
            </div>
            <div class="col-md-3"></div>
          </div>


          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 text-center">
              <h3>Complaint: </h3>
              <p style="font-size:16px;"><?php echo $sql->first()->complaint; ?></p>
            </div>
            <div class="col-md-1"></div>
          </div>

          <div class="row text-center">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="margin-top:3%;">
              <label><b>LECTURER INVOLVED :</b> </label>
              <?php echo $sql->first()->lecturer; ?>
            </div>
            <div class="col-md-2"></div>
          </div>

          <hr width="50%;">

        <div class="row text-center" style="margin-top:1%;">
          
          <div class="col-md-4" style="margin-top:3%;">
            <label><b>SUBMITTED ON :</b></label><br/>
            <input type="text" name="" class="form-control text-center" value="<?php echo $sql->first()->date; ?>" readonly style="cursor:text;">
          </div>

          <div class="col-md-4" style="margin-top:3%;">
            <label><b>LEVEL | STATE :</b> </label>
            <input type="text" name="" class="form-control text-center" value="<?php echo $sql->first()->level; ?>" readonly style="cursor:text;">
          </div>
          
          <div class="col-md-4" style="margin-top:3%;">
            <label><b>SUBMITTED BY :</b></label><br/>
            <img src="profile/<?php echo $sql->first()->photo ?>" style="width:35px; height:auto; border-radius:50%;">
            <?php echo $sql->first()->mode; ?><BR/>
            <?php echo $sql->first()->user; ?>
          </div>
          
        </div>

      <div class="col-md-1"></div>
    </div>

    

<!-- from top -->

    <?php

        }
    
        else
    
        {
    
    ?>
        <div class="alert alert-danger">
            <p>THERE WAS A PROBLEM RECOVERING DATA !!!</p>
        </div>
    <?php        
    
        }

    ?> 
<!--  -->

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
