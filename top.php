<body align="center">
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
            <div><form action="search.php" class="s_top" method="post"><input type='search' name="search" placeholder="Search" style="padding: 6px; border-radius: 0; border: none; margin-left: 5px; margin-right:5px;">
            <input type="submit" value="Go" style="padding: 6px; border:1px solid transparent; border-radius: 2px; background-color: white;"></form></div>
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
            <a href="../cart_view.php">View Cart</a>
           
        </div>
        <div class="home_content">