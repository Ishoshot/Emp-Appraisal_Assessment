<?php
if(Input::exists()){
    if (Token::check(Input::get('token'))) {

      $validate = new Validate();
      $validation = $validate->check($_POST, array(
          'surname' => array(
            'required'=>true,
            'min'=>2,
            'max'=>20
          ),
          
          'firstname' => array(
            'required'=>true,
            'min'=>2,
            'max'=>20
          ),

          'phone' => array(
            'required'=>true,
            'min'=>2,
            'max'=>20
          ),

          'department' => array(
            'required'=>true,
            'min'=>2,
            'max'=>40
          ),

          'level' => array(
            'required'=>true,
            'min'=>2,
            'max'=>10
          ),

          'matric' =>array(
            'required'=>true,
            'min'=>2,
            'max'=>35,
            'unique' => 'users'
          ),

          'email' =>array(
            'required'=>true, 
            'min'=>2,
            'max'=>35,
            'unique' => 'users'
          )
      ));
      if ($validation->passed()) {
          $user = new User();
          $salt = Hash::salt(32);
          $photo = "avatar.png";

          try{

            $user->Create(array(
              'username' => Input::get('email'),
              'password' => Hash::make(Input::get('matric'), $salt),
              'salt' => $salt,
              'surname' => Input::get('surname'),
              'firstname' => Input::get('firstname'),
              'matric' => Input::get('matric'),
              'email' => Input::get('email'),
              'phone' => Input::get('phone'),
              'department' => Input::get('department'),
              'level' => Input::get('level'),
              'photo'       => $photo,
              'opt'       => "student",
              'joined' => date('d F Y, h:i A'),
              'group' => 1

            ));

            $surname = Input::get('surname');
            $username = Input::get('email');
            $password = Input::get('matric');

            Session::flash('home', 'You have been registered and can now login');
              ?>
                <div class="row">
                <div class="col-lg-12 ">
                  <div class="alert alert-success">
                  <strong>Dear <?php echo $surname; ?>!</strong> Your Login Details Are: <br/>
                  <b>Username : </b> <?php echo $username; ?> AND
                  <b>Password : </b> <?php echo $password; ?> <br/>
                  <span>Proceed to <a href="login.php">Login</a> </span>
                  </div> 
                </div>
                </div>

              <?php
            }
            catch(Exception $e){
            die($e->getMessage());
          }
          
        }else{
          
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