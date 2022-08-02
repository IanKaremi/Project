<?php

session_start();
unset($_SESSION['cart']);
header('location: Pages/index.php');

?>