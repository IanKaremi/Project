<?php
    include_once"config.php";

    session_start();
    include_once"userid.php";
    $v = $_SESSION['value']; 
    $sql = "INSERT INTO `purchases` (`purchaseID`, `userID`, `workID`, `date`) VALUES (NULL, $user_id, $v, current_timestamp());";
    $q2=$con->query($sql) or die($con->error);
    $_SESSION['cart']=array();
    header ('location: Pages/likes.php');
    //echo $user_id,"<br>",$v;
                    
?>