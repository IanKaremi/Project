<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>NeoTones - Last Monthly Sales</title>
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
        echo "<h1 align=left>Total Sales - Last 30 Days</h1>";
                    require_once "../config.php";
                    require_once "admin_check.php";
                    $revenue=0;

                    $total="SELECT COUNT(purchaseID) as num FROM `purchased_works` WHERE `date` BETWEEN CURRENT_DATE-30 AND CURRENT_DATE ";
                    $qr= $con ->query($total) or die($con->error);
                    $row= $qr->fetch_assoc();
                    echo "<h1>".$row['num']." transactions made.</h1>";
                    echo"<br>";

                    echo"<h3>Breakdown by Genre:</h3> <br><div id='gen'>";

                    $elec="SELECT COUNT(purchaseID) as num FROM `purchased_works` WHERE `date` BETWEEN CURRENT_DATE-30 AND CURRENT_DATE AND`Genre`='electronic'; ";
                    $qr= $con ->query($elec) or die($con->error);
                    $row= $qr->fetch_assoc();
                    echo"Electronic: ";
                    echo $row['num'];
                    echo"<br>";

                    $afro="SELECT COUNT(purchaseID) as num FROM `purchased_works` WHERE `date` BETWEEN CURRENT_DATE-30 AND CURRENT_DATE AND `Genre`='afro'; ";
                    $qr= $con ->query($afro) or die($con->error);
                    $row= $qr->fetch_assoc();
                    echo"Afro: ";
                    echo $row['num'];
                    echo"<br>";

                    $cty="SELECT COUNT(purchaseID) as num FROM `purchased_works` WHERE `date` BETWEEN CURRENT_DATE-30 AND CURRENT_DATE AND `Genre`='country'; ";
                    $qr= $con ->query($cty) or die($con->error);
                    $row= $qr->fetch_assoc();
                    echo"Country: ";
                    echo $row['num'];
                    echo"<br>";

                    $gos="SELECT COUNT(purchaseID) as num FROM `purchased_works` WHERE `date` BETWEEN CURRENT_DATE-30 AND CURRENT_DATE AND `Genre`='gospel'; ";
                    $qr= $con ->query($gos) or die($con->error);
                    $row= $qr->fetch_assoc();
                    echo"Gospel: ";
                    echo $row['num'];
                    echo"<br>";

                    $hip="SELECT COUNT(purchaseID) as num FROM `purchased_works` WHERE `date` BETWEEN CURRENT_DATE-30 AND CURRENT_DATE AND `Genre`='hip-hop'; ";
                    $qr= $con ->query($hip) or die($con->error);
                    $row= $qr->fetch_assoc();
                    echo"Hip-Hop & RnB: ";
                    echo $row['num'];
                    echo"<br>";

                    $jazz="SELECT COUNT(purchaseID) as num FROM `purchased_works` WHERE `date` BETWEEN CURRENT_DATE-30 AND CURRENT_DATE AND `Genre`='jazz'; ";
                    $qr= $con ->query($jazz) or die($con->error);
                    $row= $qr->fetch_assoc();
                    echo"Jazz: ";
                    echo $row['num'];
                    echo"<br>";

                    $pop="SELECT COUNT(purchaseID) as num FROM `purchased_works` WHERE `date` BETWEEN CURRENT_DATE-30 AND CURRENT_DATE AND `Genre`='pop'; ";
                    $qr= $con ->query($pop) or die($con->error);
                    $row= $qr->fetch_assoc();
                    echo"Pop: ";
                    echo $row['num'];
                    echo"<br>";

                    $reg="SELECT COUNT(purchaseID) as num FROM `purchased_works` WHERE `date` BETWEEN CURRENT_DATE-30 AND CURRENT_DATE AND `Genre`='reggae'; ";
                    $qr= $con ->query($reg) or die($con->error);
                    $row= $qr->fetch_assoc();
                    echo"Reggae: ";
                    echo $row['num'];
                    echo"<br>";

                    $roc="SELECT COUNT(purchaseID) as num FROM `purchased_works` WHERE `date` BETWEEN CURRENT_DATE-30 AND CURRENT_DATE AND `Genre`='rock'; ";
                    $qr= $con ->query($roc) or die($con->error);
                    $row= $qr->fetch_assoc();
                    echo"Rock: ";
                    echo $row['num'];
                    echo"<br>";
                    echo"<br></div>";


                    /* $sql = "SELECT Artist_Name,MAX(mycount) from(SELECT Artist_Name,Artist_ID,COUNT(purchaseID) AS mycount  FROM `purchased_works`GROUP BY Artist_ID) as counts;";*/

                    $sql = "SELECT purchaseID,Artist_Name, COUNT(purchaseID) AS `value_occurrence` FROM `purchased_works` WHERE `date` BETWEEN CURRENT_DATE-30 AND CURRENT_DATE GROUP BY Artist_Name ORDER BY `value_occurrence` DESC LIMIT 1;";
                    $query= $con ->query($sql) or die($con->error);
                    $row = $query->fetch_assoc();
                    echo"<h3>Top Selling Artist <br></h3>";
                    echo "<div id='art'>".$row['Artist_Name']." : ".$row['value_occurrence']."</div>";
                    echo"<br>";

                    $price="SELECT Price FROM `purchased_works`";
                    $qr= $con ->query($price) or die($con->error);

                    if(!$qr || mysqli_num_rows($qr) > 0)
                    {
                        while($row = $qr->fetch_assoc()) {
                            $revenue += $row['Price'];
                        }
                    }else{
                        echo "0 results";
                    };
                    echo"<div id='rev'>";
                    echo"<div>Total Revenue: Ksh.".$revenue."</div>";
                    echo "<div> Commission (30%): Ksh.".$revenue*.3."</div>";
                    echo "<div>Expected Artist Payout: Ksh.". $revenue *0.7."</div>";
                    echo"</div>";
                    mysqli_close($con);
                    include_once "../bottom.html"
    ?>
</html>