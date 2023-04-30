<?php
include('config.php');
// session_start();
$id_product = $_GET['id_product'];

$result = mysqli_query($con, "SELECT * FROM prod WHERE id = $id_product");
$_cart['ids'][] = $result;

echo "<script>console.log(".$_cart.")<script>" ;

header('location: shop.php');

?>