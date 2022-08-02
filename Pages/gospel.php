<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Gospel - Neo Tones</title>
        <meta name="description" content="">
        <meta name="theme-color" content="#8a5cffff">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/feed.css">
        <link rel="stylesheet" href="../css/common.css">
    </head>
  

    <?php
     include_once"../top.php";
     echo "<h1 align=left>Best Of Gospel Music</h1>";


     require_once"../config.php";
     $elec="SELECT * FROM `works_list` WHERE `Genre`='gospel';";

     $qr= $con ->query($elec) or die($con->error);
     $var;

     
     
     if(!$qr || mysqli_num_rows($qr) > 0)
     {
         
         while($row = $qr->fetch_assoc()) {
             echo"<hr> <div class='entry'>";
             echo "<div class='img'> <img src=../"
             .$row['Art'].">"

             ."</div><div><p align=left id='entry_title'>"
             .$row['Name']."    "
             ."</p><p align=left id='entry_artist'>"
             .$row['Artist_Name']."    "
             ."</p></div><div>"
            
             ."</div><div>"
             .$row['Release_Date']."    "."<br>"
             .$row['Type']."    "."<br>"
             .$row['Length']."    "."<br>"
             .$row['Tags']."    "
             ."</div><div>"
             .$row['Description']."    "
             ."</div><div>"
             .$row['Price']." "
             ."<button><a>Add To Cart</a></button>"
             ."</div>";
             echo"</div>";
            
             
         }

         echo"<hr>";
         
         
    }else{
         echo"<h2>Zero results ......:[<h2>";
     };

    mysqli_close($con);
    include_once"../bottom.html"
     
    ?>          
   
</html>