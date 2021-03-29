<?php 

// access modifier [public,protected,private]
// inside class , outside class (global scope) , child classes
// public [inside class,global scope,child classes]
// protected [inside class , child classes]
// private [inside class]
// class car {
    // private $color;
    // public function setColor($color)
    // {
    //     $this->color = $color;
    // }
    // public function getColor()
    // {
    //    return $this->color;
    // }
    // private $color = 'red';
    // public function printColor()
    // {
    //     echo $this->color;
    // }
// }

// class mercides extends car {
    // public function printColorMer()
    // {
    //    echo $this->color;
    // }
// }

// $bmw = new car;
// echo $bmw->color;
// $bmw->printColor();
// $merc = new mercides;
// $merc->printColorMer();
// echo $merc->color;


// final class user {
//     public final function login()
//     {
//         echo "login As User";
//     }
// }

// class admin extends user {
//     public function login()
//     {
//         echo "login AS admin";
//     }
// }


// abstraction
// abstract class operatoin {
//     public $color;
//     public function sayHello()
//     {
//        echo "hello";
//     }
//     abstract public function login();
// }




// class user extends operatoin {
//     public function login()
//     {
//         echo "user login";
//     }
// }

// class admin extends operatoin {
//     public function login()
//     {
//         echo "admin login";
//     }
// }

// class supplier extends admin {
//     public function login()
//     {
//         echo "supplier login";
//     }
// }


// interface operation {
//      const x = 5;
//      function login();
//      function logout();
// }

// interface db {
//     function selectAll();
//     function insertData();
//     function deleteData();
//     function  updateData();
// }

// echo operation::x;
// class user implements db {

  
//     public function selectAll(){

//     }
//     public function insertData(){

//     }
//     public function deleteData(){

//     }
//     public function  updateData(){

//     }
// }

// class admin implements operation {

//     public function login()
//     {
//         echo "login admin";
//     }

//     public function logout()
//     {
//         echo "logout admin";
//     }

   
// }

// class supplier extends user implements operation,db {

//     public function login()
//     {
//         echo "login admin";
//     }

//     public function logout()
//     {
//         echo "logout admin";
//     }

// }

// class vendor extends supplier implements operation,db {

// }