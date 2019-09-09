<?php require 'core/init.php';
  
  $user = new user;

 if ($user->isLoggedIn()) {

    if (!$user->hasPermission('admin')) {
       Redirect::to('welcome.php');
    }
    elseif (!$user->hasPermission('admin') && !$user->data()->group == '3' && !$user->data()->opt == 'lecturer'){
       Redirect::to('welcome.php');
    }

      $id = $_GET['id'];
  
      $sql = DB::getInstance()->query("DELETE FROM complaints where c_id ='$id'");
  
      if (!$sql->count())
      {
        echo "ERROR!"; 
      }
      else
      {
        Session::flash('home','Complaint was Successfully Deleted !!!');
       Redirect::to('admcomplaints.php');
      }
  }
  else{
        Redirect::to('login.php');
  }

?>