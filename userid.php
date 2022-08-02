<?php

if (isset($_SESSION['username'])){
    $user = $_SESSION['username'];
                $id="SELECT User_ID FROM users WHERE username= '$user'";
                $qr2= $con ->query($id) or die($con->error);
                    
                    if(!$qr2 || mysqli_num_rows($qr2) > 0)
                    {
                        while($u_id = $qr2->fetch_assoc()) {
                        //    echo $u_id['User_ID'] ;
                        //    echo"<br/>";
                        $user_id= $u_id['User_ID'];
                    }

                }
    }
?>