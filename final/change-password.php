<?php 
include_once "layouts/header.php";
include_once "validations/userValidation.php";
include_once "app/User.php";
$userValidation = new userValidation;
$user = $userValidation->emailURLValidation($_GET);
// verify Email In URL
// print_r($user);

if(isset($_POST['submit'])){
    // validate on password 
    $errors = [];
    $userValidation->setPassword($_POST['Password']);
    $userValidation->setConfirmPassword($_POST['confirm-password']);
    $passwordValidations = $userValidation->PasswordValidation();
    if(empty($passwordValidations)){
        $userPassword = new User;
        $userPassword->setPassword($_POST['Password']);
        $userPassword->setEmail($user->E_mail);
        // prevent old password
        if($user->Password == $userPassword->getPassword() ){
            $errors['oldPassowrd'] =  "<div class='alert alert-danger'> You Have Entered an Old Password  </div>";
        }else{
            // update password in DB
            $result = $userPassword->updatePassword();
            if($result){
                // store user data in session
                $user->Password = $userPassword->getPassword();
                $_SESSION['user'] = $user;
                // header index.php
                header('Location:index.php');
            }else{
                $errors['someThing'] =  "<div class='alert alert-danger'> someThing Went Wrong  </div>";
            }
        }
    }

   
}
?>

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-image-3 ptb-150">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h3>Change Password</h3>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Change Password </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <div class="login-register-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab" href="#lg1">
                                <h4> Change Password </h4>
                            </a>
                           
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form  method="post">
                                            <input type="password" name="Password" placeholder="Password">
                                            <?php 
                                                if(isset($passwordValidations['password']) ){
                                                    echo $passwordValidations['password'];
                                                }
                                                if(isset($passwordValidations['pattern']) ){
                                                    echo $passwordValidations['pattern'];
                                                }
                                                if(!empty($errors)){
                                                    foreach ($errors as $key => $value) {
                                                        echo $value;
                                                    }
                                                }
                                            ?>
                                            <input type="password" name="confirm-password" placeholder="Confrim Password">
                                            <?php 
                                             if(isset($passwordValidations['confirmPassword'])){
                                                echo $passwordValidations['confirmPassword'];
                                            }
                                            if(isset($passwordValidations['confrim'])){
                                                echo $passwordValidations['confrim'];
                                            }
                                            ?>
                                            <div class="button-box">
                                                
                                                <button type="submit" name="submit"><span>Change Password</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include_once "layouts/footer.php" ?>
