<?php

//contoh (name di html e.g 'Sketch', alamat folder e.g 'images/', tinggi e.g 300)
//hasil namanya (name di html)_()
function resizingImage($image,$file,$desiredHeight,$prefix1,$prefix2,$alternatePrefix){
// if(isset($_POST['submit'])){

//get the image name and image temporary name
//FOLDER -> SUBSTITUTE INTO FUNCTION
$imagename = $_FILES[$image]['name']; //subs function image
$imagetempname = $_FILES[$image]['tmp_name'];

//get the extension
//FOLDER -> SUBSTITUTE INTO FUNCTION
$targetfile = $file;//subs function folder
$target = $targetfile.basename($imagename);   
$extension=strtolower(pathinfo($target,PATHINFO_EXTENSION));


//for extracting last image to be used in our new image
if($extension == "jpg" || $extension == "jpeg"){
    $createImageSource = imagecreatefromjpeg($imagetempname);
}
else if($extension == "png"){
    $createImageSource = imagecreatefrompng($imagetempname);
}
else if($extension == "gif"){
    $createImageSource = imagecreatefromgif($imagetempname);
}
else if($extension == "bmp"){
    $createImageSource = imagecreatefromgbmp($imagetempname);
}
else{
    echo "no proper image selected";
}

//create new image by using last image, the new image has new size from uploaded image 
$imagesize=getimagesize($imagetempname);
list($width,$height)=$imagesize;
$newHeight=$desiredHeight;//subs function height
$newWidth=$newHeight*$width/$height;
$newCanvas=imagecreatetruecolor($newWidth,$newHeight);
$newImage=imagecopyresampled($newCanvas,$createImageSource,0,0,0,0,$newWidth,$newHeight,$width,$height);


//upload the image by using new canvas/size
imagepng($newCanvas,$target);

//untuk me-rename file yang diupload


if(!empty($prefix1)){
    $identifier=$prefix1;
}
else{
    $identifier='IMG';
}

if(!empty($prefix2)){
    $identifier2=$prefix2;
}
else{
    $identifier2=$alternatePrefix;
}


//$dateFile = date("Y-m-d_h.ma");
$namaFileBaru = $targetfile.$image.'_'.$identifier.'_'.$identifier2.'.'.$extension;

rename($target, $namaFileBaru); //(nama file lama, nama file baru)

//untuk menghapus resource-resource yang sudah dibuat
imagedestroy($createImageSource);
imagedestroy($newCanvas);

/*
echo "<br>";
echo "$identifier";
echo "<br>";
echo "$identifier2";
echo "<br>";


echo $imagename;
echo "<br>";
echo $imagetempname;
echo "<br>";
echo $targetfile;
echo "<br>";
echo $target;

echo "<br>";
print_r($imagesize);
echo "<br>";
echo $width;
echo "<br>";
echo $height;

echo "<br>";
echo $newHeight;
echo "<br>";
echo $newWidth;
echo "<br>";
echo $newCanvas;
echo "<br>";
echo $createImageSource;

echo "<br>";
echo $extension;

echo "<br>";
echo date("Y-m-d_h:ma");

echo "<br>";
echo $namaFileBaru;
*/
}


