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

          'reason' => array(
            'required'=>true,
            'min'=>5
          ),

          'improve' => array(
            'required'=>true,
            'min'=>5
          ),
          
          'praise' => array(
            'required'=>true,
            'min'=>5
          ),

          'lecturer' =>array(
            'required'=>true
          ),

          'rate' => array(
            'required'=>true
          )

      ));
      if ($validation->passed()) {

          $query = DB::getInstance()->insert('praise', array(
          'mode'    => input::get('mode'),
          'photo'       => input::get('photo'),
          'reason'       => input::get('reason'),
          'improve' => input::get('improve'),
          'praise'   => input::get('praise'),
          'rate'   => input::get('rate'),
          'lecturer'   => input::get('lecturer'),
          'user'   => $username,
          'date' => date('d F Y, h:i A')
           ));

          Session::flash('home', 'Congratulations, You Appraisal was successfully submitted !!!');
          
          Redirect::to('subappraise.php');       
          
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