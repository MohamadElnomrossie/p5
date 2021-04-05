<?php 
class userValidation {
    private $password;
    private $passwordConfirmation;
    private $email;

    // getters
    public function getPassword()
    {
        return $this->password;
    }
    public function getConfrimPassword()
    {
        return $this->passwordConfirmation;
    }
    public function getEmail()
    {
        return $this->email;
    }

    // setters
    public function setPassword($password)
    {
        # code...
        $this->password = $password;
    }
    public function setConfirmPassword($passwordConfirmation)
    {
        # code...
        $this->passwordConfirmation = $passwordConfirmation;
    }
    public function setEmail($email)
    {
        # code...
        $this->email = $email;
    }

    public function PasswordValidation()
    {
       $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
       //Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character
        $errors = [];
        if(!$this->password){
            $errors['password'] = "<div class='alert alert-danger'> Password Is Required </div>";
        }
        if(!$this->passwordConfirmation){
            $errors['confirmPassword'] = "<div class='alert alert-danger'> Confrim Password Is Required </div>";
        }
        if(empty($errors)){
            // check regular expression
            if(!preg_match($pattern,$this->password)){
                $errors['pattern'] = "<div class='alert alert-danger'> Password Must Be Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character </div>";
            }
            // check on confirmation
            if($this->password != $this->passwordConfirmation){
                $errors['confrim'] = "<div class='alert alert-danger'> Password Not Matched </div>";
            }
        }

        return $errors;
    }

    public function emailValidation()
    {
        $pattern = "/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
        //
        $errors = [];
        if(!$this->email){
            $errors['required'] = "<div class='alert alert-danger'> Email Is Required </div>";
        }else{
            if(!preg_match($pattern,$this->email)){
                $errors['pattern'] = "<div class='alert alert-danger'> Wrong Email Format </div>";
            }
        }
        return $errors;
    }

    public function passwordLoginValidation()
    {
        $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        $errors = [];
        if(!$this->password){
            $errors['required'] = "<div class='alert alert-danger'> Password Is Required </div>";
        }else{
            if(!preg_match($pattern,$this->password)){
                $errors['pattern'] = "<div class='alert alert-danger'> Wrong Email Or Password </div>";
            }
        }
        return $errors;
    }

    public function emailURLValidation($data)
    {
        if ($data) {
            // if get has key = email
            if (isset($data['email'])) {
                // if email has value
                if ($data['email']) {
                    $emailChecked = new user;
                    $emailChecked->setEmail($data['email']);
                    $verifyEmail = $emailChecked->emailCheck();
                    if($verifyEmail){
                        $user = $verifyEmail->fetch_object();
                        return $user;
                    }else{
                        header('Location:404.php');
                    }
                }else{
                    header('Location:404.php');
                }
            }else{
                header('Location:404.php');
            }
        }else{
            header('Location:404.php');
        }
    }

}
?>