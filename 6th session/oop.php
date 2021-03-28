<?php
// OOP (object oriented programming)
// Classes (group similar tasks) // objects (instance of class to use in global scope)

// OOP Features
// More clean for developers
// easy to maintain
// more dynamic
// more secure

// OOP Principles
//1) inheritance
//2) encapsulation
//3) polymorphism
//4) abstraction

// class car {
//     // properties => variables , methods=>functions , constants
//     public $model;
//     public $maxSpeed;
//     public $color = 'Black';
//     public $hasSunRoof = True;

//     public function SayHello(){
//         echo "Beep";
//     }
//     public function SaySpeed($speed){
//         echo 'Your Speed is: '.$speed;
//     }
// }

// $bmw = new car;
// $bmw->model = 'X3';
// $bmw->maxSpeed = 280;
// $bmw->addFeature = True;
// // echo $bmw->maxSpeed;
// $bmw->SaySpeed($bmw->maxSpeed);
// // echo $bmw->color;
// print_r($bmw);

// $verna = new car;
// $verna->Music = True;
// // $verna->model = 'verna 2016';
// // $verna->maxSpeed = 220;
// // $verna->color = 'Blue'; 
// print_r($verna);


// $mercides = new car;
// print_r($mercides);



// samsung (note10,8GB RAM,128GB Storage,FULL HD+,5000 ma,has charger ,black, take photos )
// iphone  (iphoneX,4GB Ram, 64GB storage,FULL HD,3500 ma,has not charger,black,wireless charging,take photos)

// class mobile {
//     public $type;
//     public $name;
//     public $RAM;
//     public $storage;
//     public $screen;
//     public $battery;
//     public $hasCharger;
//     public $color = 'black';

//     public function takePhotos()
//     {
//         echo "take photo FROM $this->name  <br>";
//     }

//     public function printObject()
//     {
//         // this pseudo variable=> refer to current object inside class scope
//         print_r($this);
//     }

//     public function printFeature()
//     {
//         echo "mobile is " . $this->name . ", RAM :" . $this->RAM . ", Storage:" . $this->storage; 
//     }
// }

// $samsung = new mobile;
// $samsung->type = 'samsung';
// $samsung->name = 'NOTE 10';
// $samsung->RAM = '8 GB';
// $samsung->storage=  128;
// $samsung->screen = 'FULL HD +';
// $samsung->battery = 5000;
// $samsung->hasCharger = TRUE;
// // $samsung->takePhotos();


// $iphone = new mobile;
// $iphone->type = 'iphone';
// $iphone->name = 'iphoneX';
// $iphone->RAM = '4 GB';
// $iphone->storage=  64;
// $iphone->screen = 'FULL HD';
// $iphone->battery = 3500;
// $iphone->hasCharger = FALSE;
// $iphone->wirelessCharging = true;
// // $iphone->takePhotos();
// // $iphone->printObject();
// $samsung->printFeature();
// print_r($samsung);
// print_r($iphone);

// chaining methods
// class car {
//     public $color;
//     public function addBlackColor()
//     {
//         $this->color .= ' + black';
//         return $this;
//     }
//     public function addWhiteColor()
//     {
//          $this->color .= ' + white';
//          return $this;
//     }
// }

// $verna = new car;
// $verna->color = 'yellow';
// $verna->addBlackColor()->addWhiteColor()->addWhiteColor();
// echo $verna->color;
// $verna->addBlackColor();
// $verna->addBlackColor();

// class mobile {
//     public $Ram = 5;
//     const color = 'black';
//     public static $screen = 'FUll HD';
//     public function increaseRam() {
//         $this->Ram+=1;
//         return $this->Ram;
//     }
//     public static function ram()
//     {
//         // return $this->increaseRam();
//     }

//     public static function printColor()
//     {
//         // echo self::color;
//         // echo mobile::color;
//         echo SELF::$screen;
//     }
// }

// $samsung = new mobile;
// echo $samsung::$screen;
// print_r($samsung);
// $samsung->Ram = 8;
//  $samsung->printColor();
// echo mobile::color; // scope resolution operator double colon
// mobile::ram();
//  mobile::$screen = 'Full HD+';







