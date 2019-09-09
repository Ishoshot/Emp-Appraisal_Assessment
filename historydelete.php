<?php require 'core/init.php';
  
  $user = new user;

 if ($user->isLoggedIn()) {

    if ($user->hasPermission('admin')) {
       Redirect::to('admin.php');
    }
    elseif ($user->data()->group == '3') {
       Redirect::to('lecturer.php');
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
       Redirect::to('history.php');
      }
  }
  else{
        Redirect::to('login.php');
  }

?>