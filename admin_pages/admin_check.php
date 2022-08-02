<?php
    $S= $_SESSION['username'];
    $check ="SELECT usertype FROM users WHERE username='$S'";
    $query= $con ->query($check) or die($con->error);
    $row = $query->fetch_assoc();

    if( $row['usertype'] != 'admin' ){
        echo"<script type='text/Javascript'> alert('You do not have sufficient privileges to access this page. Please log in with an Administrator account.'); </script>";
        echo "<script type='text/Javascript'> window.location.assign('http://127.0.0.1/NeoTones/Pages/login.php');</script>"; 
    }
?>