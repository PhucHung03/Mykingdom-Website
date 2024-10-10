<?php
session_start();
$idsp = $_GET['id'];
$quantity = $_POST['quantity'];

$cart = [];
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}

for ($i = 0; $i < count($cart); $i++) {
    if ($cart[$i]['id'] == $idsp) {
        $cart[$i]['quantity'] = $quantity;
        break;
    }
}

//update session
$_SESSION['cart'] = $cart;

header("Location: cart.php");

?>