<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cart - Neo Tones</title>
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
        <div class="logo" align="left"><a href="Pages/index.php">NeoTones</a></div>
        <div class="toolbar">
            <div><a href="Pages/feed.php">Feed</a></div>
            <div><a href="Pages/likes.php">Purchased</a></div>
            <div class="drop">
                <div><a>Genres</a>
                    <div class="on_hover">
                        <a href="Pages/afro.php">Afro</a>
                        <a href="Pages/hip.php">Hip-hop & RnB</a>
                        <a href="Pages/gospel.php">Gospel</a>
                        <a href="Pages/electronic.php">Electronic</a>
                        <a href="Pages/pop.php">Pop</a>
                        <a href="Pages/rock.php">Rock</a>
                        <a href="Pages/reggae.php">Reggae</a>
                        <a href="Pages/country.php">Country</a>
                        <a href="Pages/Jazz.php">Jazz</a>                   
                    </div>
                </div>
            </div>
            <div><form action="search.php" class="s_top" method="post"><input type='search' name="search" placeholder="Search" style="padding: 6px; border-radius: 0; border: none; margin-left: 5px; margin-right:5px;">
            <input type="submit" value="Go" style="padding: 6px; border:1px solid transparent; border-radius: 2px; background-color: white;"></form></div>
            <?php
            session_start();
            if( isset($_SESSION['login'])){
                echo"<div>". $_SESSION['username']."</div>";
                echo"<div id= 'login'><a href='../NeoTones/Pages/logout.php'>Log Out</a></div>";
           }else{
               echo"<div id='login'><a href='../NeoTones/Pages/login.php'>Login</a></div>";
               echo"<div id='sign_up'><a href='signup.php'>Sign Up</a></div>";
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
    
        echo "<h1 align=left>Cart</h1>";
                   require_once"config.php";
                   $total_price=0;

            if(isset($_SESSION['login'])){
                if(isset($_SESSION['cart'])){
                
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
                          ."<button><a href=item_delete.php?ID=" .$row['ID']. ">Remove</a></button>"
                          ."</div>";
                          echo"</div>";

                          $total_price += $row['Price']; 
                          
                      }

                      echo"<hr>";
                  }else{
                      echo" Zero results";
                  };

                }else{
                    echo"Your cart is empty.";
                } 
            }else{
                echo"Please log in to add items to cart.";
            }   

                  mysqli_close($con);
                 
                ?>
                <div class="checkout">
                    
                    <div><p id="entry_title">Total Price: KSH.<?php echo($total_price);?> </p></div>
             
                    <div> 
                        <button align="right">
                            <a id="#paypal"href="payment.php">Checkout</a>
                        </button>
                    </div>
            
                </div>
                             
                </div>
           
            </div>
            <div></div>
        </div>
        <script src="" async defer></script>
        

    </body>
                
               
</html>