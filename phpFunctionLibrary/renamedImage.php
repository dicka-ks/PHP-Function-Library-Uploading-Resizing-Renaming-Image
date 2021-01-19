<?php

function renamedImage($image,$file,$prefix1,$prefix2,$alternatePrefix){
    //nama file yang diupload
    //get $identifier and $identifier2
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

    //get $extension
    $targetfile = $file;
    $imagename = $_FILES[$image]['name'];
    $target = $targetfile.basename($imagename);   
    $extension=strtolower(pathinfo($target,PATHINFO_EXTENSION));

    //new image name
    $fileMySQL = $image.'_'.$identifier.'_'.$identifier2.'.'.$extension;
    
    return $fileMySQL;
    }
