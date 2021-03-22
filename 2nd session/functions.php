<?php

// $user1 = "ahmed";
// $points1 = 12;
// calRes($points1);
// echo "<br>";




// function calRes ($points) {
//     $pricePerPoint = 2;
//     $result = $points * $pricePerPoint;
//     $result1AfterTax = $result * 1.14;
//     echo $result1AfterTax;
// }


// $user2 = "mohamed";
// $points2 = 15;
// calRes($points2);


// function functionName (parameters) {  body  }
// invoke==> functionName(parameters if needed)
// you can invoke function after or before declaration
// parameters btrteb
// optional parameters should be at the end of parameters

// function add (  $thirdNumber , $secondNumber = 0  , $firstNumber = 0 ) {
//     $result =  $firstNumber + $secondNumber + $thirdNumber;
//     echo $result . '<br>';
// }


// add(50,60,70);
// add(5,60);
// add(50);


// temp < 15 ==> cold weather
// temp >= 15 <= 25 ==> warm weather
// temp >25 ==> hot weather

function calWeather($temp){
    if($temp  <  15){
        // - infinity => 14
        return "<div class='alert alert-primary'> Cold Weather </div>";
    }elseif($temp >= 15 && $temp <= 25){
        // 15 => 25
        return "<div class='alert alert-warning'> Warm Weather </div>";
    }else{
        // 26 => infinity
        return "<div class='alert alert-danger'> Hot Weather </div>";
    }
}
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
      <div class="row text-center">
        <div class="col-12">
            <?php $msg =  calWeather(20);
            echo $msg; ?>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
