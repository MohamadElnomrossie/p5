<?php
include_once "layouts/header.php";
include_once "app/User.php";
include_once "validations/userValidation.php";
include_once "includes/mustGuest.php";

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['submit'])) {
    $errors = [];
    $userValidation = new userValidation;
    $userValidation->setPassword($_POST['Password']);
    $userValidation->setEmail($_POST['E_mail']);
    $emailValidation = $userValidation->emailValidation();
    $passwordLoginValidation = $userValidation->passwordLoginValidation();
    if(empty($emailValidation) && empty($passwordLoginValidation)){
        $user = new user;
        $user->setEmail($_POST['E_mail']);
        $user->setPassword($_POST['Password']);
        $result = $user->login();
        if($result){
            $loggedInUser = $result->fetch_object();
            // print_r($loggedInUser);die;
            if($loggedInUser->Status == 1){
                $_SESSION['user'] = $loggedInUser;
                header('Location:index.php');
            }elseif($loggedInUser->Status == 2){
                // generate code
                $code = rand(10000,99999);
                // update code in DB
                $user->setCode( $code );
                $updatedCode = $user->updateCode();
                if($updatedCode){
                    // data updated
                    // send mail
                    //Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);
                    $msg = "<h5>Hello <b>" . $loggedInUser->Name . "</b></h5>
                            <p>Your Verification Code:<b>$code</b></p>
                            <h5>Best Wishes</h5>";
                    try {
                        //Server settings
                        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'ntiecommerce67@gmail.com';                     //SMTP username
                        $mail->Password   = 'NTI@123456';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                        //Recipients
                        $mail->setFrom('ntiecommerce67@gmail.com', 'Ecommerce');
                        $mail->addAddress($_POST['E_mail']);     //Add a recipient
                    

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Email Verification';
                        $mail->Body    = $msg;

                        $mail->send();
                        header("Location:check-code.php?email=".$_POST['E_mail'].'&forget=0');

                        // echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    // header check code
                }else{
                    $errors['someThing'] = "<div class='alert alert-danger'> Something Went Wrong </div>";

                }

                
            }
        }else{
            $errors['auth'] = "<div class='alert alert-danger'> Wrong Email Or Password </div>";
        }
    }
    
}
?>

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>LOGIN</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Login</li>
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
                            <h4> login </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="email" name="E_mail" placeholder="Email">
                                        <?php 
                                            if(!empty($emailValidation)){
                                                foreach ($emailValidation as $key => $value) {
                                                   echo $value;
                                                }
                                            }
                                        ?>
                                        <input type="password" name="Password" placeholder="Password">
                                        <?php 
                                            if(!empty($passwordLoginValidation)){
                                                foreach ($passwordLoginValidation as $key => $value) {
                                                   echo $value;
                                                }
                                            }
                                        ?>
                                        <div class="button-box">
                                            <div class="login-toggle-btn">

                                                <a href="verify-email.php">Forgot Password?</a>
                                            </div>
                                            <button type="submit" name="submit"><span>Login</span></button>
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