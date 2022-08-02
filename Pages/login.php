<?php

session_start();

// Include config file
require_once "../config.php";

$username = $password = "";

if (isset($_POST['login'])){

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $query="SELECT * FROM users WHERE username= '$username' ";
    $res= $con ->query($query) or die($con->error);


    if (!$res || mysqli_num_rows($res)>0){
        while($row = $res->fetch_assoc()){
            /*echo"Results:  <br/>";
            echo ("Username:     ". $row['username'] ."<br/>");
            echo("Hashed Password:     ". $row['password']."<br/>" );*/
            $hash = $row['password'];
            $pass_match= password_verify($password , $hash); 
            if($pass_match){
                $_SESSION["login"] = true;
                $_SESSION["username"] = $row['username'];
                if ($row["usertype"]== 'admin') {
                    header('location: ../admin_pages/admin_panel.php');
                }
                else{
                    header('location: index.php');
                }
                echo"Success!";
            }
        }
    }

    else
        {
            $login_err= 'Invalid Username and Password Combination';
        }
   
    }
                
    mysqli_close($con);

?>
 
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login - Neo Tones</title>
        <meta name="description" content="">
        <meta name="theme-color" content=""#8a5cffff>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/feed.css">
        <link rel="stylesheet" href="../css/common.css">
        <style>
            <?php
                include_once "button.css";
            ?>
        </style>
        
    
    </head>
    <body align=center>
        <header>
            <div class="logo" align="left"><a href="index.php">NeoTones</a></div>
            <div class="toolbar">
                <div><a href="feed.php">Feed</a></div>
                <div><a href="likes.php">Purchased</a></div>
                <div class="drop">
                    <div><a>Genres</a>
                        <div class="on_hover">
                            <a href="afro.php">Afro</a>
                            <a href="hip.php">Hip-hop & RnB</a>
                            <a href="gospel.php">Gospel</a>
                            <a href="electronic.php">Electronic</a>
                            <a href="pop.php">Pop</a>
                            <a href="rock.php">Rock</a>
                            <a href="reggae.php">Reggae</a>
                            <a href="country.php">Country</a>
                            <a href="Jazz.php">Jazz</a>                   
                        </div>
                    </div>
                </div>
                
             
            </div>
        </header>
        <div class="home_body">
            <div></div>
        <div class="home_content">
            <h1 align=left>Login</h1>
            <p>Please fill in your credentials to login.</p>

            <?php 
            if(!empty($login_err)){
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }        
            ?>
            <div class="form">

            <!--<form action="test.php" method="post">-->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" style=" padding: 6px;font-size: 17px;margin-bottom: 5px;margin-top: 5px;
                    border: 2px solid white; width:25em;"class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                </div>    

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class=" form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                </div>

                <div class="form-group">
                    <input type="submit"  name="login" value="Login">
                </div>
                <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
                <p>Artist? <a href="art_login.php">Artist Login</a>.</p>
            </form>
        </div>
        </div>
        <div></div>
    </div>
  
</body>
</html>