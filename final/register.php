<?php
include_once "layouts/header.php";
include_once "validations/userValidation.php";
include_once "app/User.php";
include_once "includes/mustGuest.php";
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';

// check on button
if (isset($_POST['submit'])) {
    $errors = [];
    // validate on data $_POST
    // get instance
    $validation = new userValidation;
    // set required data to object
    $validation->setPassword($_POST['Password']);
    $validation->setConfirmPassword($_POST['confirm-password']);
    // call password validation method
    $passwordValidation = $validation->PasswordValidation();

    $validation->setEmail($_POST['E_mail']);
    $emailValidation = $validation->emailValidation();

    // check on return of validation method
    if (empty($passwordValidation) && empty($emailValidation)) {
        // if return is empty array => success validation
        // if there is no validation errors
        $user = new User;
        $user->setName($_POST['Name']);
        $user->setPassword($_POST['Password']);
        $user->setEmail($_POST['E_mail']);
        $user->setGender($_POST['Gender']);
        $user->setPhone($_POST['Phone']);
        $code = rand(10000, 99999);
        $user->setCode($code);
        
        $emailExists = $user->emailCheck();
        if (empty($emailExists)) {
            // insert new user in DB
            $result = $user->insertData();
            // check on query
            if ($result) {
                // if there is no error (SEND MAIL  WIth CODE && header on checkCode page)
                // send mail

                    

                    //Instantiation and passing `true` enables exceptions
                    $mail = new PHPMailer(true);
                    $msg = "<h5>Hello <b>" . $_POST['Name'] . "</b></h5>
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

                    // header check code;
            } else {
                // if there error (something went wrong)
                $errors['database'] = "<div class='alert alert-danger text-center'> SomeThing Went Wrong </div>";
            }
        } else {
            $errors['EmailExists'] = "<div class='alert alert-danger'>Email Already Exists </div>";
        }
    }
}




?>

<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>Register</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="active">Register</li>
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
                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> Register </h4>
                        </a>
                    </div>
                    <div class="tab-content">

                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?php
                                    if (isset($errors['database'])) {
                                       echo $errors['database'];
                                    }
                                    ?>
                                    <form method="post">
                                        <input type="text" name="Name" placeholder="Full Name" value="<?php if (isset($_POST['Name'])) {
                                                                                                            echo $_POST['Name'];
                                                                                                        } ?>">
                                        <input name="E_mail" placeholder="Email" type="email" value="<?php echo (isset($_POST['E_mail']) ? $_POST['E_mail'] : '') ?>">
                                        <?php
                                        if (!empty($emailValidation)) {
                                            foreach ($emailValidation as $key => $value) {
                                                echo $value;
                                            }
                                        }
                                        if (isset($errors['EmailExists'])) {
                                            echo $errors['EmailExists'];
                                         }
                                        ?>
                                        <input name="Phone" placeholder="Phone" type="tel" value="<?php echo (isset($_POST['Phone']) ? $_POST['Phone'] : '') ?>">
                                        <input type="password" name="Password" placeholder="Password">
                                        <?php
                                        if (!empty($passwordValidation)) {
                                            foreach ($passwordValidation as $key => $value) {
                                                echo $value;
                                            }
                                        }
                                        ?>
                                        <input type="password" name="confirm-password" placeholder="Confirm Password">
                                        <select name="Gender" class="form-control" id="">
                                            <option <?php echo ((isset($_POST['Gender']) && $_POST['Gender'] == 'm') ? 'selected' : '')  ?> value="m">Male</option>
                                            <option <?php echo ((isset($_POST['Gender']) && $_POST['Gender'] == 'f') ? 'selected' : '')  ?> value="f">Female</option>
                                        </select>

                                        <div class="button-box my-4">
                                            <button type="submit" name="submit"><span>Register</span></button>
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