<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Neo Tones Music Store</title>
        <meta name="theme-color" content="#8a5cffff">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/common.css">
        <link rel="stylesheet" href="../css/my_stylesheet.css">
        <style>
           <?php
                include_once "../css/button.css";
            ?>
        </style>

    </head>
    <?php
        include_once"../art_top.php";

    ?>

        <?php
            $total_price=0;
            include"../config.php";
            $sql = "SELECT * FROM `purchased_works` WHERE `Artist Name` LIKE '%".$_SESSION['username']."%';";
            $query= $con->query($sql) or die($con->error);
            while($row = $query->fetch_assoc()){
                $total_price += $row['Price'];
            }
            $num= $query->num_rows;
        ?>
   
                <h1>Sales for: <?php echo($_SESSION['username']);?></h1>
                <p>For All Time:</p> 
                <hr>
                <h2>Your tracks have been purchased</h2>
                <p> <?php echo("$num"); ?> Times</p>
                <h2>With total revenue of</h2>
                <p>KSH. <?php echo("$total_price");?></p>
                <h2>With 30% revenue share,you are due </h2>
                <p>KSH.<?php echo (0.7*$total_price);?>
                <br><br>
            </div>
            <div></div>
        </div>
        <script src="" async defer></script>
    </body>
</html>