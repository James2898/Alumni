<?php 
    //session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Alumni Management System | Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include 'include_top.php'; ?>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/util.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">
    <!--===============================================================================================-->
    </head>
    <body style="background-color: #666666;">
        
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <!-- <form class="login100-form validate-form" method="post" role="form" id="form_login"> -->
                        <?php echo form_open('Login/login', 'class="login100-form validate-form"','role="form"','id="form_login"'); ?>
                        <?php
                            echo "<div class='error_msg'>";
                            if (isset($error_message)) {
                                echo $error_message;
                            }
                            echo validation_errors();
                            echo "</div>";
                        ?>
                        <span class="login100-form-title p-b-43">
                            Login to continue 
                        </span>
                        <p>
                            <?php print_r($_SESSION) ?>
                        </p>
                        <div class="validate-input login100 form-input bg-white" data-validate = "Valid email is required">
                           <label class="bmd-label-floating text-center">User ID</label>
                            <input type="text" id="form_user" class="form-control text-center" value="1" name="user_ID">
                        </div>
                        
                       <div class="validate-input form-input bg-white" data-validate = "Valid email is required">
                            <label class="bmd-label-floating text-center">Password</label>
                            <input type="Password" id="form_password" class="form-control text-center" value="admin" name ="password">
                        </div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn btn btn-danger">
                                Login
                            </button>
                        </div>
                    <!-- </form> -->
                    <?php echo form_close(); ?>
                    <div class="login100-more" style="background-image: url('<?php echo base_url(); ?>assets/img/cover.jpg');">
                    </div>
                </div>
            </div>
        </div>
        <?php 
            include 'include_bottom.php';
         ?>
    </body>
</html>
