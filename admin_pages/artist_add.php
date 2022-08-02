<?php
   
    require_once"../config.php";

    if(isset($_GET['ID'])){
        $key= $_GET['ID'];
        //adding a user to artists
        //1:switch boolean in users table
        //2:get details from users
        //3:add details to artists
        $query2 = "SELECT * FROM users WHERE User_ID = ?";
        $query = "UPDATE users SET is_artist = 1 WHERE User_ID = ?";

        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $key);
        $stmt->execute();
        mysqli_stmt_close($stmt);

        $stmt2 = $con->prepare($query2);
        $stmt2->bind_param("s", $key);
        $stmt2->execute();
        $result = $stmt2->get_result();
        $row = $result->fetch_assoc() or die($con -> error);
        mysqli_stmt_close($stmt2);

        $qr3 = "INSERT INTO artists ( Artist_Name, Artist_Email) VALUES (?,?) ";
        $stmt3 = $con->prepare($qr3);
        $stmt3->bind_param("ss", $row['username'], $row['email']);
        $stmt3->execute();
        mysqli_stmt_close($stmt3);

        header('location: admin_user_add.php');
    }

    if(isset($_GET['ID2'])){
        //unset boolean
        //delete from artists
        $key2 = $_GET['ID2'];

        $query = "UPDATE users SET is_artist = 0 WHERE User_ID = ?";
        echo $key2."<br>";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $key2);
        $stmt->execute();


        $qry2 = "SELECT * FROM users WHERE User_ID = ?";
        $stmt2 = $con->prepare($qry2);
        $stmt2->bind_param("s", $key2);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        $row2 = $result2->fetch_assoc() or die($con -> error);
        echo  $row2['username'];

        $name = $row2['username'];
        $query3 = "DELETE FROM `artists` WHERE Artist_Name = ? ";
        $stmt4 = $con->prepare($query3);
        $stmt4->bind_param("s", $row2['username']);
        $stmt4->execute();

        mysqli_stmt_close($stmt2);
        mysqli_stmt_close($stmt4);

        header('location: admin_user_add.php');
    }
?>