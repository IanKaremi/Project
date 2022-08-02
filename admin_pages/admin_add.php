<?php
   
    require_once"../config.php";

    if(isset($_GET['ID'])){
        $key= $_GET['ID'];
        //echo $key."<br>";
        //$query = "SELECT * FROM users WHERE User_ID = ?";
        $query = "UPDATE users SET usertype = 'admin' WHERE User_ID = ?";

        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $key);
        $stmt->execute();
        //$result = $stmt->get_result();
        //$row = $result->fetch_assoc() or die($con -> error);
       // echo $row['username'];
        header('location: admin_user_add.php');
    }

    if(isset($_GET['ID2'])){
        
        $key2 = $_GET['ID2'];
        $query = "UPDATE users SET usertype = 'user' WHERE User_ID = ?";
        echo $key2."<br>";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $key2);
        $stmt->execute();
        header('location: admin_user_add.php');
    }
?>