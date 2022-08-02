<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>NeoTones - Add Music</title>
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
    
    <h1 align=left>Add Music</h1>

    <p>Please fill this form to add new works.</p>
            <form action="db_write.php" method="post">
                <div class="form-group">
                
                    <input type="text" name="Title" style="    padding: 6px;font-size: 17px;margin-bottom: 5px;margin-top: 5px;
                    border: 2px solid white; width:25em;"placeholder="Title" class="form-control <?php //echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php //echo $username; ?>">
                    <span class="invalid-feedback"><?php //echo $username_err; ?></span>
                </div>    
                <div class="form-group">
               
                    <input type="text" name="art" style=" padding: 6px;font-size: 17px;margin-bottom: 5px;margin-top: 5px;
                    border: 2px solid white; width:25em;" placeholder="Local Path to Album Art Image File(png or jpeg)" class="form-control <?php //echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php //echo $password; ?>">
                    <span class="invalid-feedback"><?php //echo $password_err; ?></span>
                </div>
                <div class="form-group">

                    <label for="Artist_ID">Artist:</label>
                        <select name="Artist_ID" required style="padding: 6px;font-size: 17px;margin-bottom: 5px;margin-top: 5px;
                    border: 2px solid white; width:23em;">
                            <option value="">--Please choose an option--</option>
                            <?php
                                require_once"../config.php";
                                require_once "admin_check.php";
                                $art="SELECT * FROM ARTISTS";
                                $qr= $con ->query($art) or die($con->error);
                
                                if(!$qr || mysqli_num_rows($qr) > 0)
                                {
                                    while( $row = $qr->fetch_assoc())
                                    {
                                        echo"<option value=".$row['Artist_ID'].">";
                                        echo $row['Artist_ID']."- ";
                                        echo $row['Artist_Name'] ."</option>";
                                    }
                                }
                                mysqli_close($con);
                            ?>
                        </select>
                   
                </div>
                <div class="form-group">
                 
                <label for="genre">Genre: </label>
                        <select name="genre" required style="padding: 6px;font-size: 17px;margin-bottom: 5px;margin-top: 5px;
                    border: 2px solid white; width:23em;">
                            <option value="">--Please choose an option--</option>
                            <option value="afro">Afro</option>
                            <option value="pop">Pop</option>
                            <option value="hip-hop">Hip Hop & RnB</option>
                            <option value="electronic">Electronic</option>
                            <option value="gospel">Gospel</option>
                            <option value="rock">Rock</option>
                            <option value="reggae">Reggae</option>
                            <option value="jazz">Jazz</option>
                            <option value="country">Country</option>                           
                        </select>
                </div>
                <div class="form-group">
                 
                    <input type="text" name="tags" style="    padding: 6px;font-size: 17px;margin-bottom: 5px;margin-top: 5px;
                    border: 2px solid white; width:25em;" placeholder="Tags" class="form-control <?php //echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php //echo $confirm_password; ?>">
                    <span class="invalid-feedback"><?php //echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                 
                    <input type="text" name="length" style="    padding: 6px;font-size: 17px;margin-bottom: 5px;margin-top: 5px;
                    border: 2px solid white; width:25em;" placeholder="Length(in minutes)" class="form-control <?php //echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php //echo $confirm_password; ?>">
                    <span class="invalid-feedback"><?php //echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                 
                    <input type="text" name="type" style="    padding: 6px;font-size: 17px;margin-bottom: 5px;margin-top: 5px;
                    border: 2px solid white; width:25em;" placeholder="Type (Album or Single)" class="form-control <?php //echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php //echo $confirm_password; ?>">
                    <span class="invalid-feedback"><?php //echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                 
                    <input type="text" name="desc" style="    padding: 6px;font-size: 17px;margin-bottom: 5px;margin-top: 5px;
                    border: 2px solid white; width:25em;" placeholder="Description" class="form-control <?php //echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php //echo $confirm_password; ?>">
                    <span class="invalid-feedback"><?php //echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                 
                    <input type="number" min="100" max="1000" name="price" style="    padding: 6px;font-size: 17px;margin-bottom: 5px;margin-top: 5px;
                    border: 2px solid white; width:25em;" placeholder="Price in KSH" class="form-control <?php //echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php //echo $confirm_password; ?>">
                    <span class="invalid-feedback"><?php //echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                 
                    <input type="date" name="reldate" style="    padding: 6px;font-size: 17px;margin-bottom: 5px;margin-top: 5px;
                    border: 2px solid white; width:25em;"  placeholder="Release Date" class="form-control <?php //echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php //echo $confirm_password; ?>">
                    <span class="invalid-feedback"><?php //echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                 
                    <input type="url" name="url" style="    padding: 6px;font-size: 17px;margin-bottom: 5px;margin-top: 5px;
                    border: 2px solid white; width:25em;" placeholder="File Url" class="form-control <?php //echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php //echo $confirm_password; ?>">
                    <span class="invalid-feedback"><?php //echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" style="padding:6px; border:2px; background-color:white;"class="btn btn-primary" value="Submit">
                    <input type="reset" style="padding:6px; border:2px; background-color:white;" class="btn btn-secondary ml-2" value="Reset">
                </div>
            </form>
           <?php include_once "../bottom.html"; ?>
</html>