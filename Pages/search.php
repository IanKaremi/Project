<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Search - Neo Tones</title>
        <meta name="description" content="">
        <meta name="theme-color" content="#8a5cffff">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/feed.css">
        <link rel="stylesheet" href="../css/common.css">
        <style>
            h1{
                margin-left: 1em;
            }

            img{
                height:200px;
                width:200px;
               
                padding-left: 5px;
                padding-right: 5px;
            }

            .entry{
                display:grid;
                grid-template-columns: 1fr 3fr 1fr;
                grid-template-rows: 13em 7em ;
                
            }
            #entry_title{
                font-size: 40px;
                font-weight: 700;
            }

            #entry_artist{
                font-size: 30px;
                font-weight: 700;
            }

            button{
                color:azure;
                font-size:larger;
                font-weight:400;
                background-color: rgb(119, 211, 13);
                border:1px solid black;
                border-radius:5px;
                -webkit-border-radius:5px;
                -moz-border-radius:5px;
                -ms-border-radius:5px;
                -o-border-radius:5px;
                width:10rem;
                margin-right: 5px;
                margin-top: 50px;
                padding: 10px;
            }
        </style>
    </head>
    
    <?php
                $search=strip_tags($_POST['search']);
                
                include_once"../top.php";
                   echo "<h1 align=left>Search results for ".$search."</h1>";
                  
                    require_once"../config.php";
                   
                    

                    $elec="SELECT * FROM `works_list` WHERE (`Artist_Name`LIKE '%". $search."%') OR (`Name` LIKE '%". $search."%')";

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
                        echo"<h2>No results were found,"."</br>"."Try searching for another term. </h2>";
                    };


                    include_once "../bottom.html";
                ?>
     
        
    
</html>