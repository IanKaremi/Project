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
        include_once"../top.php";
        error_reporting(0);
    ?>
   
                <h1>"Home of The Vibe."</h1>
                <p>With over</p> 
                <div id="count">1000</div>
                <p> releases cataloged, NeoTones is your one-stop music store.</p>
                <P>Want to find music? With NeoTones you can..</P>
                <hr>
                <div class="search">
                    <h2>...Search by Artist Name or Title:</h2>
                    <form action="search.php" method="post">
                    <input id="searchbar" type="search" name="search">
                    <input id="search" type="submit" value="Go">
                    </form>
                    <!--style the search bar-->
                </div>
                <hr>
                <h2>... or Choose by Genre:</h2>
                <div class="g_section">
                    <div></div>
                    <div class="genres">
                        <div><img class="index_img" src="../img/burna-boy.png"><br><a href="afro.php"></a>Afro</a></div>
                        <div><a href="hip.php"><img class="index_img" src="../img/migos.png"><br>Hip-hop & RnB</a></div>
                        <div><a href="gospel.php"><img class="index_img" src="../img/kirk.png"><br>Gospel</a></div>
                        <div><a href="electronic.php"><img class="index_img" src="../img/deadmau5.png"><br>Electronic</a></div>
                        <div><a href="pop.php"><img class="index_img" src="../img/ed.png"><br>Pop</a></div>
                        <div><a href="rock.php"><img class="index_img" src="../img/polyphia.png"><br>Rock</a></div>
                        <div><a href="reggae.php"><img class="index_img" src="../img/kon.png"><br>Reggae</a></div>
                        <div><a href="country.php"><img class="index_img" src="../img/lb.png"><br>Country</a></div>
                        <div><a href="Jazz.php"><img class="index_img" src="../img/hh.png"><br>Jazz</a></div>
                    </div>
                    <div></div>
                <br><br>
                </div>
           
            </div>
            <div></div>
        </div>
        <script src="" async defer></script>
    </body>
</html>