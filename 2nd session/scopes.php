<?php
// declare(strict_types = 1);
// advanced 


// function subRes(int $x, int $y) : int {
//     return  (($y - $x)*0.5);
// }

// $y = 5.3;
// $x = 10;
// $result = subRes($y,$x);

// echo $result;


// $x = 5.9;
// $y = (int) $x;
// echo $y;



// $x = 5;
   
// function test() {
//     $x = 1;
//     $x += 1;
//     echo $x.'<br>';
// }

// test();

// echo $x;

// $x = 2;
// $y = 1;
// function test(){
//     $x = 1;
//     echo $x; // 1
//     echo $y; // undifiend
// }
// echo $x; // 2
// echo $y; // 1
// function test2(){
//     $y =2;
//     echo $x; // undifiend
//     echo $y; // 2
// }

// function test3(){
//     global $x,$y;
//     echo $x; // 2
//     echo $y; // 1
//     $x +=1;
//     $y +=1;
// }
// test3();
// echo $x; // 3
// echo $y; // 2

// function test4(){
//     $z = 5;
//     return $z;
// }
// echo test4();
function countTimes() {
    static $x = 1;
    echo $x . '<br>';
    $x++;
}

countTimes(); //1
countTimes();
countTimes();
countTimes();
countTimes();

?>