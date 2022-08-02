<body align="center">
    <header>
        <div class="logo" align="left"><a href="index.php">NeoTones For Artists</a></div>
        <div class="toolbar">
            <div class="drop">
                <div><a>Sales</a>
                    <div class="on_hover">
                        <a href="art_home.php">Breakdown</a>
                    </div>
                </div>
            </div>
            <?php
            session_start();
            if(isset($_SESSION['login'])){
                echo"<div>". $_SESSION['username']."</div>";
                echo"<div id= 'login'><a href='logout.php'>Log Out</a></div>";
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