<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Checkout - Neo Tones</title>
        <meta name="description" content="">
        <meta name="theme-color" content=""#8a5cffff>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/feed.css">
        <link rel="stylesheet" href="css/common.css">
        <style>
           <?php
            
                include_once "css/button.css";
            ?>
        </style>
        

    </head>
    <body align="center">
    <header>
        <div align="left"><a href="clearcart.php">Back To Homepage</a></div>
        <?php
            session_start();
            if( $_SESSION['login']==true){
                echo"<div>". $_SESSION['username']."</div>";
                
           }else{
               echo"<div id='login'><a href='login.php'>Login</a></div>";
           }
            ?>

        </div>
    </header>
    <div class="home_body">
        <div class="sidebar">
            <a href="cart_view.php">View Cart</a>
        </div>
        <div class="home_content">
<?php
   
        echo "<h1 align=left>Checkout</h1>";
                  require_once"config.php";

                require_once"userid.php";
                


                  $query="SELECT * FROM `works_list` WHERE ID IN (".implode(',',$_SESSION['cart']).")";
                  $qr= $con ->query($query) or die($con->error);
                  
                  if(!$qr || mysqli_num_rows($qr) > 0)
                  {
                      while($row = $qr->fetch_assoc()) {
                          echo"<hr> <div class='entry'>";
                          echo "<div class='img'> <img src="
                          .$row['Art'].">"

                          ."</div><div><p align=left id='entry_title'>"
                          .$row['Name']."    "
                          ."</p><p align=left id='entry_artist'>"
                          .$row['Artist Name']."    "
                          ."</p></div><div>"
                          ."</div><div>"."Release date:   "
                          .$row['Release_Date']."    "."<br>"."Release Type:   "
                          .$row['Type']."    "."<br>"."Length:    "
                          .$row['Length']."    "."<br>"
                          .$row['Tags']."    "
                          ."</div><div>"
                          .$row['Description']."    "
                          ."</div><div>"."Price: Ksh. "
                          .$row['Price']." "
                          ."<button><a href=".$row['url'].">Download</a></button>"
                          ."</div>";
                          echo"</div>";
                      }

                      echo"<hr>";
                  }else{
                      echo"0 results";
                  };

                  mysqli_close($con);
                  include_once "bottom.html"
                ?>
</html>