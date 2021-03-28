<?php
// inheritance
class mobile {
    public $screen ="FULL HD";
    public $ram = 55;
    public $storage;

    public function sayWelcome($x)
    {
        return "Welcome From Mobile class<br>";
    }
}
$mobile = new mobile;
// print_r($mobile);
// echo $mobile->sayWelcome();
class samsung  {
    public $charger = 'true';
    // public $ram = 5;
    public function sayWelcome()
    {
        return "Welcome From Samsung Class <br>";
    }
    public function takePhoto()
    {
        return $this->sayWelcome();
    }
}
$samsung = new samsung;
// echo $samsung->takePhoto();
// $mobile->sayWelcome();
// print_r($samsung);

class iphone extends samsung {
    public $wirelessCharger = 'True';
    public function faceID()
    {
        return $this->takePhoto();
    }
}
$iphone = new iphone;
echo $iphone->sayWelcome();
// // print_r($iphone);