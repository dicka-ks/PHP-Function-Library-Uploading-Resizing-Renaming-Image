<?php

include_once "../phpFunctionLibrary/resizingImage.php";
include_once "../phpFunctionLibrary/renamedImage.php";

//function uploading and resizing image 
    $image          =  'sketch';
    $file           = 'images/';
    $desiredHeight  =       300;

    $prefix1        = @$_POST['style'];
    $prefix2        = @$_POST['color'];

    $alternatePrefix= uniqid();
    

    resizingImage($image,$file,$desiredHeight,$prefix1,$prefix2,$alternatePrefix);
    renamedImage($image,$file,$prefix1,$prefix2,$alternatePrefix);


$style=$_POST['style'];
$color=$_POST['color'];
$fabrication=$_POST['fabrication'];
$fob=$_POST['fob'];
$sketch=$_FILES['sketch']['name'];

