<?php
include_once "header.php";
// how to access data accross vriuous pages
// how to redirect to any page
// how to include static code (HTML OR PHP)
if(isset($_SESSION['user'])){
header('location:home.php');
}



$users = [
    [
        'id' => 1,
        'name' => 'ahmed',
        'email' => 'ahmed@gmail.com',
        'password' => '123456',
        'image' => '1.png',
        'gender' => 'm'
    ],
    [
        'id' => 2,
        'name' => 'esraa',
        'email' => 'esraa@gmail.com',
        'password' => '123456',
        'image' => '2.png',
        'gender' => 'f'
    ],
    [
        'id' => 3,
        'name' => 'galal',
        'email' => 'galal@gmail.com',
        'password' => '123456',
        'image' => '3.png',
        'gender' => 'm'
    ]
];

if (isset($_POST['submit'])) {
    $errors = [];
    if(!$_POST['email']){
        $errors['email'] = "<div class='alert alert-danger'> Email is required </div>";
    }

    if(!$_POST['password']){
        $errors['password'] = "<div class='alert alert-danger'> Password is required </div>";
    }

    if(empty($errors)){
        // login logic
       
        $user = array_filter($users,function ($value){
                return ($value['email'] == $_POST['email'] AND $value['password']  == $_POST['password']);
        });

        if($user){
            $user = array_values($user);
            $_SESSION['user'] = $user[0];
            header('Location:home.php');
        }else{
            $errors['auth'] = "<div class='alert alert-danger'> Wrong Email Or Password </div>";
        }
    }

}
?>
    
        <div class="col-12 text-center text-primary my-5">
            <p class="h1">Login</p>
        </div>
        <div class="offset-4 col-4">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo(isset($_POST['email']) ? $_POST['email'] : '' ) ?>">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <?php 
                if(isset($errors['email'])){
                    echo $errors['email'];
                }
                ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <?php 
                if(isset($errors['password'])){
                    echo $errors['password'];
                }
                if(isset($errors['auth'])){
                    echo $errors['auth'];
                }   
                ?>
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
                
            </form>
        </div>
<?php include "footer.php" ?>