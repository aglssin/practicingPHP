<?php 

if(isset($_FILES['image'])){
    include_once "models/uploader.class.php";
    $uploader = new Uploader('image');
    $uploader->saveIn(".");
    try{
        $uploader->save();
        $UplaodMessage = "image has uplaoded";
    }catch(Exception $e){
        $UplaodMessage= $e->getMessage();
    }
}

if(isset($_GET['delete-image']) and file_exists($_GET['delete-image'])){
    unlink($_GET['delete-image']);
}

$imageManager = include_once "views/admin/image-html.php";
return $imageManager;