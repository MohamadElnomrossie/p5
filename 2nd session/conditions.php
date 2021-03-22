<?php
// $status = 1; // 0=> not verified , 1=> active user , 2=> banned user , 3=> completeprofile
// // 0 , null , '' , [] , (object)[]
// if($status == 1){
//     echo "go to home page";
// }elseif($status == 0){
//     echo "go to verify page";
// }elseif($status == 2){
//     echo "redirect to login page with error msg";
// }elseif($status == 3){
//     echo "redirect to complete profile page with error msg";
// }


// $gender = "female";
// if($gender == "male"){
//     echo "m";
// }else{
//     echo "f";
// }

// $gender = 'm';
// $age = 30; 

// if($gender == 'm' AND $age <= 30){

// }

// if($gender == 'f' And $age > 30){

// }

// if($gender == 'm' AND $gender == 'f'){

// }

// if($gender == 'f' OR $gender == 'm'){

// }

// if($age >= 30 AND $age <= 30){

// }

// if($age > 30 AND $age < 50){
// }


// $color = "blue";
// switch($color) {
//     case "red":
//         echo "red";
//         break;
//     case "blue":
//         echo "blue";
//         break;
//     case "green": 
//         echo "green";
//         break;
//     default: 
//         echo "not supported color";
// }



// ternary operator
$gender = "f";

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <form action="">
        <div class="row">
            <div class="col-3">
                <select name="" id="" class="form-control">
                    <option value="" >Choose gender</option>
                    <option <?php if($gender == 'm'){echo "selected";} ?> value="m">Male</option>
                    <option <?php echo($gender == "f"  ? "selected" : "") ?>  value="f">Female</option>
                </select>
            </div>
        </div>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>


<?php


// ternary operator
$status = 1;
$status = ($status == 0) ? 'not active' : 'active';
echo $status . '<br>';

$gender == 'f' ? $type = 'female' : $type = 'male';
echo $type;

// ternary operator (if shorthand )
// condition ? true : false
?>