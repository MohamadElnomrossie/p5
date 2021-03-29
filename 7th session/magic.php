<?php
// magic methods
// construct
// destruct

// class operation {

// }

// class user
// {
//     private $message;
//     function __construct($msg)
//     {
//        $this->message = $msg;
//     }
//     public function printMessage()
//     {
//         echo $this->message;
//     }

// }
// $message = "Hello User";
// $newUser = new user($message);
// $newUser->printMessage();

// class admin extends user
// {
//     function __construct()
//     {
//         parent::__construct();
//         // $this->__construct();
//     }

//     public function login()
//     {
//         echo "login admin<br>";
//     }

//     function __destruct()
//     {
//         echo "hello from admin destructor <br>";
//     }
// }

// class supplier {

//     public function magicCOnstants()
//     {

//         echo __LINE__;
//     }
// }
// $supplier = new supplier ;
// $supplier->magicCOnstants();

// class upload {
//     public static function uploadPhoto($photo,$folder)
//     {

//     }
// }
// class user {

//     public function register()
//     {
//         upload::uploadPhoto('photo.png','users');
//     }
// }
// class product {

//     public function insertProduct()
//     {
//         upload::uploadPhoto('photo.png','products');
//     }
// }

trait uploads
{
    public $x;
    public function uploadPhoto($file, $folder)
    {
        echo "uploadPohto From uploads trait<br>";
    }
    public function uploadPDF()
    {
        echo "uploadPDF From uploads trait<br>";
    }
}

trait response
{
    public function returnJSON()
    {
        echo "JSON FROM RESPONSE trait<br>";
    }

    public function returnHTML()
    {
        echo "HTML FROM RESPONSE trait<br>";
    }

    public function uploadPhoto($file, $folder)
    {
        echo "uploadPohto From response trait<br>";
    }
}

// trait generalTrait {
//     use response,uploads;
// }

// class user
// {
//     use response, uploads {

//         uploads::uploadPhoto AS uploadsTraitUploadPhoto;
//         response::uploadPhoto insteadof uploads;

//     }
//     public function register()
//     {
//         $this->uploadsTraitUploadPhoto('1.png', 'users');
//     }
// }

// class admin
// {
    // use response, uploads;
    // public function register()
    // {
    //     $this->uploadPhoto('1.png', 'users');
    //     $this->returnHTML();
    // }
// }
// $newUser = new user;
// $newUser->register();


// $newAdmin = new admin;
// $newAdmin->register();

// namespace
// class autoloading(class autoloader)
// JSON