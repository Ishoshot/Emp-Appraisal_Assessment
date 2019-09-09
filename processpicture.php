<?php
require_once 'core/init.php';
$user = new User();
    if (Input::exists()) {
        # code...
        if (Token::check(Input::get('token'))) {
            # code...

            $validate = new Validate();
            $validation = $validate->check($_POST, array(
            ));

            if ($validation->passed()) {
                # code...
            
              $photo = $_FILES['photo']['name'];
              $uploadfile = $_FILES["photo"]["tmp_name"];
              $target = "profile/".basename ($_FILES ['photo']['name']);
              move_uploaded_file ($uploadfile , $target);
                try{

                    $user->update(array(
                        'photo' => $photo

                    ));
                        Session::flash('home', 'You have Successfully Changed your Profile Picture !!!');
                        ?>
                        <script type="text/javascript">
                            setTimeout(function(){
                            window.location.replace("lecturer.php?user=<?php echo $users_id; ?>");
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
