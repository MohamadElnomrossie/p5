<?php
// for($initialize counter; condition ; inc/dec){
//  code to be excuted
// }


// $items = 5;
// $numbers = [5,8,97];
// for($i=0;$i<count($numbers);$i++){
//     echo $numbers[$i] .'<br>';
// }

// for($i=$items;$i>=1;$i--){
//     echo "item $i <br>";
// }




// init counter
//while(condition){

// code to be excuted


// inc/dec counter
// }




// $arr = ['galal','ahmed'];
// $lastIndex = count($arr)-1;
// $i = 0;
// while($i<=$lastIndex){
//     echo $arr[$i] . '<br>';
//     $i++;
// }


// $arr = ['galal','ahmed','mohamed'];
// $lastIndex = count($arr)-1;
// $i = $lastIndex;
// while($i>=0){
//     echo $arr[$i].'<br>';
//     $i--;
// }



// do while
// init counter 
//do {
// code to be excuted

// inc / dec counter
// } while(condition);

// $idsCount = 10;

// $i = 1;
// do {
    // echo "id: $i <br>";
//     $i++;
// }while($i<=$idsCount);


// $i = $idsCount;
// do {
//     echo "id: $i <br>";
//     $i--;
// }while($i>=1);


// foreach($array || $object AS $k=>$v){

// }

// break skip current loop
// continue skip current iteration
// $numbers = [1,2,3,4,-5,6,7,8,9];
// foreach($numbers AS $k=>$v){
//    if($v < 0)
//         break; // skip loop
//    echo $v . '<br>';
// }

// $statues = ["active","not active","not verified"];

// $select = "<select class='form-control'>";
// foreach($statues AS $key=>$value){
//     $select .= "<option> $value </option>";
// }
// $select .= "</select>";


// $users = [
//     (object)[
//         'id' => 7,
//         'name' => 'Ibrahem',
//         'email' => 'I@I.com',
//         'orders' =>  [
//             [
//                 'id' => 1532,
//                 'date' => '25-1-2021'
//             ],[
//                 'id' => 1562,
//                 'date' => '20-2-2021'
//             ]
//         ]
//     ],
//     (object)[
//         'id' => 1,
//         'name' => 'Esraa',
//         'email' => 'E@E.com',
//         'orders' =>  [
//             "order1" =>  [
//                 'id' => 265,
//                 'date' => '20-2-2021'
//             ]
//         ]
//     ]
// ];
// foreach($users[0]->orders AS $key=>$value){
//     echo  'orderId : ' . $value['id'] . ' ,date:'. $value['date'] .'<br>';
// }

// foreach($users AS $key=>$value){
//     // echo $value->name . '<br>';
//     foreach($value->orders AS $k=>$v){
//         echo 'user :' . $value->name . ' orderId ' .$v['id'] . ' ,date ' . $v['date'] .'<br>'; 
//     }

// }

// Ibrahem orderId 1532 in 25-1-2021
// Ibrahem orderId 1562 in 20-2-2021
// Esraa orderId 265 in 20-2-2021


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
    <?php //echo $select;  
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>