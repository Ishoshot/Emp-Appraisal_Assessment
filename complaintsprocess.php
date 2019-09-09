<?php
// require 'co/re/init.php';
$user = new User();
if(Input::exists()){
    if (Token::check(Input::get('token'))) {

      $validate = new Validate();
      $validation = $validate->check($_POST, array(
          'mode' =>array(
            'required'=>true,
            'min'=>2,
            'max'=>25
          ),

          'photo' =>array(
            'required'=>true
          ),

          'category' => array(
            'required'=>true,
            'min'=>2,
            'max'=>30
          ),
          
          'level' => array(
            'required'=>true,
            'min'=>2,
            'max'=>35
          ),

          'lecturer' =>array(
            'required'=>true
          ),

          'complaint' => array(
            'required'=>true,
            'min'=>10
          ),

      ));
      if ($validation->passed()) {
            
          $proof = $_FILES['proof']['name'];

          $query = DB::getInstance()->insert('complaints', array(
          'category'       => input::get('category'),
          'level' => input::get('level'),
          'proof'    => $proof,
          'mode'    => input::get('mode'),
          'photo'       => input::get('photo'),
          'lecturer'   => input::get('lecturer'),
          'complaint'   => input::get('complaint'),
          'user'   => $username,
          'date' => date('d F Y, h:i A')
           ));

          $uploadfile = $_FILES["proof"]["tmp_name"];
          $target = "evidence/".basename ($_FILES ['proof']['name']);
          move_uploaded_file ($uploadfile , $target);


            Session::flash('home', 'Your Complaint have been Delivered Successfully !!! It has been Saved in your Complaints History');
             Redirect::to('subcomplaints.php');       
          }

          else{
          
          foreach ($validation->errors() as $error) { ?>
              <div class="row">
              <div class="col-lg-12 ">
                <div class="alert alert-danger">
                   <?php echo $error, '<br>'; ?>
                </div> 
              </div>
            </div>
          <?php }
        }
    }
}
?>