<?php
// encapsulation
// class user {
//     private $username;
//     private $password;

//     // setter 
//     public function setUserName($userName){
//         $this->username = $userName;
//     } 
//     // setter
//     public function setPassword($pass)
//     {   
//        $this->password = $pass;
//     }


//     // getter
//     public function getUserName()
//     {
//        return $this->username;
//     }

//     //getter
//     public function getPassowrd()
//     {
//        return $this->password;
//     }
// }

// $newUser = new user;
// $newUser->setUserName('Galal');
// echo $newUser->getUserName();
// $newUser->setPassword('123456');
// echo $newUser->getPassowrd();
// $newUser->username = 'galal';
// echo $newUser->username;

// class colors {
//     private $color;
//     public function getColor()
//     {
//         return strtoupper($this->color);
//     }
//     public function setColor($color)
//     {
//         $colors = ['red','blue'];
//         if(in_array($color,$colors)){
//             $this->color = $color;
//         }else{
//             echo "This color is not supported";
//         }
//     }
// }


// $newColor = new colors;
// $newColor->setColor('blue');
// echo $newColor->getColor();
