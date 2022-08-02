<?php
    $id = $_POST['Artist_ID'];
    $title = $_REQUEST['Title'];
    $art = $_REQUEST['art'];
    $gen = $_REQUEST['genre'];
    $tags = $_REQUEST['tags'];
    $len = $_REQUEST['length'];
    $type = $_REQUEST['type'];
    $desc = $_REQUEST['desc'];
    $price = $_REQUEST['price'];
    $rel = $_REQUEST['reldate'];
    $url = $_REQUEST['url'];

    require_once"../config.php";
    $write ="INSERT INTO works (Art,Name,Artist,Genre,Release_Date,Type,Length,Tags,Description,Price,url) VALUES ('$art','$title','$id','$gen','$rel','$type','$len','$tags','$desc','$price','$url')";
    //$write = "INSERT INTO works (url) VALUES ('$url')";
    $qr= $con ->query($write) or die($con->error);
    if($qr){
        header("location: admin_remove.php");
    }

?>