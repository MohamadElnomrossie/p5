<?php 
include_once "layouts/header.php";
include_once "app/User.php";
include_once "validations/userValidation.php";
$validation = new userValidation;
$user = $validation->emailURLValidation($_GET);

if(isset($_POST['submit'])){
    $errors = [];
    $emailChecked =new user;
    $emailChecked->setCode($_POST['Code']);
    $emailChecked->setEmail($user->E_mail);
    $result = $emailChecked->checkCode();
    if($result){
        // update user status to 1
       if(isset($_GET['forget']) && $_GET['forget'] == 1){
            // forget password
            header('Location:change-password.php?email='.$user->E_mail);
       }elseif(isset($_GET['forget']) && $_GET['forget'] == 0){
            // register
            $emailChecked->setStatus(1);
            $status = $emailChecked->updateStatus();
            if($status){
                $_SESSION['user'] = $user;
                header('location:index.php');
            }else{
                $errors['someThing'] = "<div class='alert alert-danger'> Something Went Wrong  </div>";
            }
       }else{
            header('Location:404.php');
       }
        
    }else{
        $errors['code'] = "<div class='alert alert-danger'> Wrong Code </div>";
    }
    // $emailChecked->setEmail($_GET['email']);
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
                            <h4> Check Code </h4>
                        </a>

                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="text" name="Code" placeholder="Enter Verification Code">
                                        <?php
                                            if(!empty($errors)){
                                                foreach($errors AS $key=>$value){
                                                    echo $value;
                                                }
                                            }
                                        ?>
                                        <div class="button-box">

                                            <button type="submit" name="submit"><span>Verify</span></button>
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