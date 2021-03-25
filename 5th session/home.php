<?php
include_once "header.php";
if(!isset($_SESSION['user'])){
    header('Location:login.php');
}
?>

        <div class="col-12 text-center text-primary my-5">
            <p class="h1">Home</p>
        </div>
       
<?php require "footer.php" ?>