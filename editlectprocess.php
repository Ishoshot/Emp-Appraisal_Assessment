<?php
// require 'core/init.php';
if(Input::exists()){
    if (Token::check(Input::get('token'))) {

      $validate = new Validate();
      $validation = $validate->check($_POST, array(
          'surname' => array(
            'min'=>2,
            'max'=>20
          ),
          
          'firstname' => array(
            'min'=>2,
            'max'=>20
          ),

          'phone' => array(
            'min'=>2,
            'max'=>20
          ),

          'department' => array(
            'min'=>2,
            'max'=>40
          ),

          'level' => array(
            'required'=>true,
            'min'=>2,
            'max'=>20
          ),

          'matric' =>array(
            'min'=>2,
            'max'=>35
          ),

          'email' =>array(
            'min'=>2,
            'max'=>35
          )
      ));
      if ($validation->passed()) {

            $query = DB::getInstance()->update('users',$id, array(
              'title' => Input::get('title'),
              'username' => Input::get('email'),
              'password' => Hash::make(Input::get('matric'), $salt),
              'surname' => Input::get('surname'),
              'firstname' => Input::get('firstname'),
              'matric' => Input::get('matric'),
              'email' => Input::get('email'),
              'phone' => Input::get('phone'),
              'department' => Input::get('department'),
              'level' => Input::get('level')

            ));
             
              Session::flash('home', 'Lecturer details was Successfully Updated !!! All changes will reflect Immediately');
              redirect::to('mglecturers.php');
          
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
          <?php
        }

        }
      }
  }
?>
