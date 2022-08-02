<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Purchased - Neo Tones</title>
        <meta name="description" content="">
        <meta name="theme-color" content="#8a5cffff">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/feed.css">
        <link rel="stylesheet" href="../css/common.css">
    </head>
    <?php include_once"../top.php";?>
   
                <h1 align="left">Purchased Works</h1>
                <?php
                include_once"../config.php";
                include_once"../userid.php";
                if(isset($_SESSION['login'])){
                    if(isset($user_id)){
                        $sql = "SELECT * FROM `purchased_works` WHERE userID='$user_id';";
                        $purch= $con->query($sql) or die($con->error);
                        while($row= $purch-> fetch_assoc()){
                            echo"<div class='purchases'>";
                            echo"<img src=../".$row['Art'].">";
                            echo "<div class='p_text'>".$row['Artist_Name']."-".$row['Name']."</div>"."<br>";
                            echo"<button><a href=".$row['url'].">Download</a></button>";
                        
                            echo"</div>";
                            echo"<hr>";
                        }
                    }else{
                        echo"You have not purchased any songs yet.";
                    }
                }else{
                    echo"Please Log in to see your purchased works.";
                }
                ?>
               
                
                </div>
           
            </div>
            <div></div>
        </div>
        <script src="" async defer></script>
    </body>
</html>