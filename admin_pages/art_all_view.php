<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>NeoTones - Select an Artist</title>
        <meta name="description" content="">
        <meta name="theme-color" content=""#8a5cffff>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/feed.css">
        <link rel="stylesheet" href="../css/common.css">
        <link rel="stylesheet" href="../css/ad_sale.css">
        <style>
           <?php
            
                include_once "../css/button.css";
                include_once"../css/sales.css";
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
    require_once"../config.php";
    $id= $_GET['ID'];
    $no=$revenue= 0;
    $no2=$revenue2= 0;
    $no3=$revenue3= 0;
    $no4=$revenue4= 0;

    require_once "admin_check.php";
    $name = "SELECT Artist_Name FROM `artists` WHERE Artist_ID='$id'";
    $query = $con ->query($name) or die($conn-> error);
    $res = $query ->fetch_assoc();

        echo "<h1 align=left>Sales for ".$res['Artist_Name']."</h1>";
                    
                    //All time revenue & sales
                    $elec="SELECT * FROM `purchased_works` WHERE Artist_ID='$id' ";
                    $qr= $con ->query($elec) or die($con->error);

                    if(!$qr || mysqli_num_rows($qr) > 0)
                    {   echo"<h2 class='head'>For All Time:</h2>";
                        echo "<div class='info'>";
                        echo"<div>";
                        while($row = $qr->fetch_assoc()) {
                            $revenue += $row['Price'];
                            if (isset($row['Price'])) {
                                $no++;
                            }
                        }
                    }else{
                        echo"No results. Check if the artist has available works for purchase.";
                        require"../bottom.html";
                        exit();
                    };
                    echo"Revenue: KSH.$revenue <br> No. of works sold: $no</div>";

                    $sql = "SELECT ID AS Work_ID, Artist_Name,Name , COUNT(purchaseID) AS `value_occurrence` FROM `purchased_works`WHERE Artist='$id' AND `date` BETWEEN CURRENT_DATE-365 AND CURRENT_DATE GROUP BY ID ORDER BY `value_occurrence` DESC LIMIT 5;";
                    $query= $con ->query($sql) or die($con->error);
                    $row = $query->fetch_assoc();
                    echo"<div><h4>Top Selling Works <br></h4>";
                    echo $row['Name']." : ".$row['value_occurrence']."</div>";
                    echo"<br></div>";

                    //last year
                    $elec2="SELECT * FROM `purchased_works` WHERE Artist_ID='$id' AND `date` BETWEEN CURRENT_DATE-365 AND CURRENT_DATE ";
                    $qr2= $con ->query($elec2) or die($con->error);

                    if(!$qr2 || mysqli_num_rows($qr2) > 0)
                    {   
                        echo"<h2 class='head'>For Last Year:</h2>";
                        echo "<div class='info'>";
                        echo"<div>";
                        while($row2 = $qr2->fetch_assoc()) {
                            $revenue2 += $row2['Price'];
                            if (isset($row2['Price'])) {
                                $no2++;
                            }
                        }
                    }else{
                        echo"0 results";
                    };
                    echo"Revenue: KSH.$revenue <br> No. of works sold: $no</div>";

                    $sql = "SELECT ID AS Work_ID, Artist_Name,Name , COUNT(purchaseID) AS `value_occurrence` FROM `purchased_works`WHERE Artist='$id' AND `date` BETWEEN CURRENT_DATE-30 AND CURRENT_DATE GROUP BY ID ORDER BY `value_occurrence` DESC LIMIT 5;";
                    $query= $con ->query($sql) or die($con->error);
                    $row = $query->fetch_assoc();
                    echo"<div><h4>Top Selling Works <br></h4>";
                    echo $row['Name']." : ".$row['value_occurrence']."</div>";
                    echo"<br></div>";

                    //last month
                    $elec3="SELECT * FROM `purchased_works` WHERE Artist_ID='$id' AND `date` BETWEEN CURRENT_DATE-30 AND CURRENT_DATE ";
                    $qr3= $con ->query($elec3) or die($con->error);

                    if(!$qr3 || mysqli_num_rows($qr3) > 0)
                    {   
                        echo"<h2 class='head'>Last 30 Days:</h2>";
                        echo "<div class='info'>";
                        echo"<div>";
                        while($row3 = $qr3->fetch_assoc()) {
                            $revenue3 += $row3['Price'];
                            if (isset($row3['Price'])) {
                                $no3++;
                            }
                        }
                    }else{
                        echo"0 results";
                    };
                    echo"Revenue: KSH.$revenue <br> No. of works sold: $no</div>";

                    $sql = "SELECT ID AS Work_ID, Artist_Name,Name , COUNT(purchaseID) AS `value_occurrence` FROM `purchased_works`WHERE Artist='$id' AND `date` BETWEEN CURRENT_DATE-30 AND CURRENT_DATE GROUP BY ID ORDER BY `value_occurrence` DESC LIMIT 5;";
                    $query= $con ->query($sql) or die($con->error);
                    $row = $query->fetch_assoc();
                    echo"<div><h4>Top Selling Works <br></h4>";
                    echo $row['Name']." : ".$row['value_occurrence']."</div>";
                    echo"<br></div>";

                    //last week
                    $elec4="SELECT * FROM `purchased_works` WHERE Artist_ID='$id' AND `date` BETWEEN CURRENT_DATE-7 AND CURRENT_DATE ";
                    $qr3= $con ->query($elec3) or die($con->error);

                    if(!$qr3 || mysqli_num_rows($qr3) > 0)
                    {   
                        
                        echo"<h2 class='head'>Last 7 days:</h2>";
                        echo "<div class='info'>";
                        echo"<div>";
                        while($row3 = $qr3->fetch_assoc()) {
                            $revenue3 += $row3['Price'];
                            if (isset($row3['Price'])) {
                                $no3++;
                            }
                        }
                    }else{
                        echo"0 results";
                    };
                    echo"Revenue: KSH.$revenue <br> No. of works sold: $no</div>";

                    $sql = "SELECT ID AS Work_ID, Artist_Name,Name , COUNT(purchaseID) AS `value_occurrence` FROM `purchased_works`WHERE Artist='$id' AND `date` BETWEEN CURRENT_DATE-7 AND CURRENT_DATE GROUP BY ID ORDER BY `value_occurrence` DESC LIMIT 5;";
                    $query= $con ->query($sql) or die($con->error);
                    $row = $query->fetch_assoc();
                    echo"<div><h4>Top Selling Works <br></h4>";
                    echo $row['Name']." : ".$row['value_occurrence']."</div>";
                    echo"<br></div>";



                    mysqli_close($con);
                    include_once "../bottom.html"
    ?>
    
</html>