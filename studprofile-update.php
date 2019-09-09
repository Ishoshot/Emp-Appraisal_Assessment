<?php
require_once 'core/init.php';
$user = new User();
    if (Input::exists()) {
        # code...
        if (Token::check(Input::get('token'))) {
            # code...

            $validate = new Validate();
            $validation = $validate->check($_POST, array(
            
            'level' => array(
                'required'=>true,
                'min'=>5,
                'max'=>6
              ),

            'email' => array(
                'required'=>true,
                'min'=>5,
                'max'=>40
              ),

            'phone' => array(
                'required'=>true,
                'min'=>7,
                'max'=>14
              )

            ));

            if ($validation->passed()) {
                # code...
                try{

                    $user->update(array(
                        'level' => input::get('level'),
                        'email' => input::get('email'),
                        'username' => input::get('email'),
                        'phone' => input::get('phone'),

                    ));
                        Session::flash('home', 'You Profile has been Updated Successfully !!!');
                        ?>
                        <script type="text/javascript">
                            setTimeout(function(){
                            window.location.replace("studprofile.php?user=<?php echo $users_id; ?>");
                                       }, 100);
                        </script>
                        <?php

                }catch(Exception $e){

                    die($e->getMessage());
                }


            }else{
                foreach ($validation->errors() as $error){
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
