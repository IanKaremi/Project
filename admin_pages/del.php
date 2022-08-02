<?php
    echo $_GET['ID'];
    $id= $_GET['ID'];
    require_once"../config.php";

    $sql="DELETE FROM `works` WHERE works.ID='$id'";
    $qr= $con ->query($sql) or die($con->error);
    if($qr){
        header("location: admin_remove.php");
    }

?>