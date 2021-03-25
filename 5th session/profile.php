<?php
include_once "header.php";
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}

if($_POST){
    // print_r($_FILES);die;
    
    $errors = [];
    $imageErrors = [];
   if(isset($_POST['email']) && $_POST['email']){
        $_SESSION['user']['email'] = $_POST['email'];
   }else{
        $errors['email'] = "<div class='alert alert-danger'> Email is required </div>";
   }

   if(isset($_POST['name'])  && $_POST['name']){
       $_SESSION['user']['name'] = $_POST['name'];
   }else{
        $errors['name'] = "<div class='alert alert-danger'> Name is required </div>";
   }

   if(isset($_POST['gender'])  &&  $_POST['gender']){
        $_SESSION['user']['gender'] = $_POST['gender'];
    }else{
        $errors['gender'] = "<div class='alert alert-danger'> Gender is required </div>";
    }

    if($_FILES['image']['error'] == 0){
        // code to upload photo
        if($_FILES['image']['size'] > (10 ** 6) ){
            $imageErrors['size'] = "<div class='alert alert-danger'> You must upload photo less than 1 megabyte </div>";
        }

        // png,jpeg,jpg
        $extension = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
        $allowedExtenstions = ['png','jpeg','jpg'];
        if(!in_array($extension,$allowedExtenstions)){
            $imageErrors['extension'] = "<div class='alert alert-danger'>You Must Upload Photo with this (png,jpg,jpeg) extensions only </div>";
        }

        
        if(empty($imageErrors)){
            $photoPath = 'images/';
            $photoName = time() . '-userId-' . $_SESSION['user']['id'] . '.' . $extension;
            $fullPath = $photoPath . $photoName; // images/12315321-userid-1.png
            // upload photo // 
            move_uploaded_file($_FILES['image']['tmp_name'] , $fullPath);
            $_SESSION['user']['image'] = $photoName;
        }



    }

}

?>

<div class="col-12 text-center">
    <p class="text-dark display-3"> Profile </p>
</div>
<div class="col-4 offset-4 my-5">
    <form method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4"  value="<?php echo $_SESSION['user']['email'] ?>">
                <?php echo(isset($errors['email']) ? $errors['email'] : "") ?>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Name</label>
                <input type="text" name="name" class="form-control" id="inputPassword4" value="<?php echo $_SESSION['user']['name'] ?>">
                <?php echo(isset($errors['name']) ? $errors['name'] : "") ?>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-12">
                <label for="inputState">Gender</label>
                <select name="gender" id="inputState" class="form-control">
                    <option <?php echo ($_SESSION['user']['gender'] == 'm' ? 'selected'  :  '') ?> value="m">Male</option>
                    <option <?php echo ($_SESSION['user']['gender'] == 'f' ? 'selected'  :  '') ?> value="f">Female</option>
                </select>
                <?php echo(isset($errors['gender']) ? $errors['gender'] : "") ?>

            </div>

        </div>
        <div class="form-group">
            <div class="form-group ">
                <label for="inputZip">Image</label>
                <img src="images/<?php echo $_SESSION['user']['image'] ?>" class="w-100" alt="">
                <input type="file" name="image" class="form-control" id="">
                <?php 
                    if(isset($imageErrors['size']) || isset($imageErrors['extension'])){
                       foreach($imageErrors AS $key=>$value){
                           echo $value;
                       }
                    }
                ?>
            </div>
        </div>
        <button type="submit" class="btn btn-dark">Update</button>
    </form>
</div>

<?php
include_once "footer.php";
?>