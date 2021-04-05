<?php
include_once "layouts/header.php";
include_once "validations/userValidation.php";
include_once "app/User.php";

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['submit'])) {
    // validate on email
    $validation = new userValidation;
    $validation->setEmail($_POST['E_mail']);
    $emailValidation = $validation->emailValidation();
    if (empty($emailValidation)) {
        $emailChecked = new user;
        $emailChecked->setEmail($_POST['E_mail']);
        // check on email if exists in db
        $result = $emailChecked->emailCheck();
        if ($result) {
            // generate code
            $code = rand(10000, 99999);
            // update code to this user
            $emailChecked->setCode($code);
            $updatedCode = $emailChecked->updateCode();
            if ($updatedCode) {
                // send mail to this user
                //Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);
                $msg = "<h5>Hello <b>" . $_POST['E_mail'] . "</b></h5>
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
                    header("Location:check-code.php?email=" . $_POST['E_mail'].'&forget=1');

                    // echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                // header to check code
            } else {
                $errors['someThing'] = "<div class='alert alert-danger'> Something Went Wrong  </div>";
            }
        } else {
            $errors['EmailExists'] = '<div class="alert alert-danger"> This Email Dosen\'t Match Our Records </div>';
        }
    }
}

?>
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>Verify Email Address</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Verify Email Address</li>
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
                            <h4> Verify Email Address </h4>
                        </a>

                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="email" name="E_mail" placeholder="Enter Your Email">
                                        <?php 
                                        if(!empty($emailValidation)){
                                            foreach ($emailValidation as $key => $value) {
                                                echo $value;
                                            }
                                        }
                                        if(!empty($errors)){
                                            foreach ($errors as $key => $value) {
                                                echo $value;
                                            }
                                        }
                                        ?>
                                        <div class="button-box">

                                            <button type="submit" name="submit"><span>Send Code</span></button>
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