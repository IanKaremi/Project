<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Latest - Neo Tones</title>
        <meta name="description" content="">
        <meta name="theme-color" content=""#8a5cffff>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/feed.css">
        <link rel="stylesheet" href="../css/common.css">
        <style>
           <?php
            
                include_once "../button.css";
            ?>
        </style>
        

    </head>
    <?php
        include_once"../top.php";
        echo "<h1 align=left>The Latest in Music</h1>";
                    require_once"../config.php";

                    if(!isset($_SESSION['cart'])){
                        $_SESSION['cart'] = array();
                    }
                    unset($_SESSION['qty_array']);
                

                   

                    $elec="SELECT * FROM `works_list` ORDER BY Release_Date DESC";

                    $qr= $con ->query($elec) or die($con->error);

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
                            ."</div><div>"."Release date:   "
                            .$row['Release_Date']."    "."<br>"."Release Type:   "
                            .$row['Type']."    "."<br>"."Length:    "
                            .$row['Length']."    "."<br>"
                            .$row['Tags']."    "
                            ."</div><div>"
                            .$row['Description']."    "
                            ."</div><div>"."Price: Ksh. "
                            .$row['Price']." "
                            ."<button><a href=add_cart.php?ID=" .$row['ID']. ">Add To Cart</a></button>"
                            ."</div>";
                            echo"</div>";
                        }

                        echo"<hr>";
                    }else{
                        echo"0 results";
                    };

                   
                    mysqli_close($con);
                    include_once "../bottom.html"
                ?>
</html>