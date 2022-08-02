<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>NeoTones - Remove Music</title>
        <meta name="description" content="">
        <meta name="theme-color" content=""#8a5cffff>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/feed.css">
        <link rel="stylesheet" href="../css/common.css">
        <link rel="stylesheet" href="../css/ad_sale.css">
        <style>
           <?php
            
                include_once "../css/button.css";
            ?>
            html,body{
                background: none;
                background-color:black;
            }
            #ft{
                padding-top: 10px;
                position:absolute;
                bottom:10px;
            }
            
        </style>
        

    </head>
    <body align="center">
    <header>
        <div class="logo" align="left"><a href="index.php">NeoTones For Administrators</a></div>
        <div class="toolbar">
            <div><a href="admin_user_add.php">User Privileges</a></div>
            <div><a href="admin_works.php">Add Music</a></div>
            <div><a href="admin_remove.php">Remove Music</a></div>
            <div class="drop">
                <div><a>Sales</a>
                    <div class="on_hover">
                        <a href="admin_panel.php">All Time</a>
                        <a href="admin_month.php">Last Month</a>
                        <a href="admin_yr.php">Last 12 Months</a>
                        <a href="admin_art.php">By Artist</a>             
                    </div>
                </div>
            </div>
            <?php
            session_start();
            if(isset($_SESSION['login'])){
                echo"<div>". $_SESSION['username']."</div>";
                echo"<div id= 'login'><a href='../Pages/logout.php'>Log Out</a></div>";
           }else{
               echo"<div id='login'><a href='login.php'>Login</a></div>";
               echo"<div id='sign_up'><a href='signup.php'>Sign Up</a></div>";
           }
            ?>

        </div>
    </header>
    <div class="home_body">
        <div class="sidebar">
        </div>
        <div class="home_content">
    <?php
        echo "<h1 align=left>Remove Music</h1>";
                    require_once "../config.php";
                    require_once "admin_check.php";

                    $elec="SELECT * FROM `works_list`";
                    $qr= $con ->query($elec) or die($con->error);

                    if(!$qr || mysqli_num_rows($qr) > 0)
                    {
                        echo"<table><thead><td>Title</td><td>Artist</td><td>Genre</td></thead><tr>";
                        while($row = $qr->fetch_assoc()) {
                            echo"<div id='user'>";
                            echo "<td>".$row['Name']."</td>";
                            echo "<td>".$row['Artist_Name']."</td>";
                            echo "<td>".$row['Genre']."</td>";
                            echo"<td><a href=del.php?ID=" .$row['ID']. ">Delete</a></td>";

                            echo"</div> </tr>";
                        } 
                    }else{
                        echo"0 results";
                    };
                    echo"</table>";
                    mysqli_close($con);
                    include_once "../bottom.html"
    ?>
    
</html>