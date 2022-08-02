<?php
	session_start();

	//remove the ID from our cart array
	$key = array_search($_GET['ID'], $_SESSION['cart']);	
	unset($_SESSION['cart'][$key]);

	unset($_SESSION['cart'][$_GET['index']]);
	//rearrange array after unset
	$_SESSION['cart'] = array_values($_SESSION['cart']);

	$_SESSION['message'] = "Product deleted from cart";
	header('location: cart_view.php');
?>