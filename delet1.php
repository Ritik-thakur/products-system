<?php
$conn=mysqli_connect("localhost","root","","Project");
extract($_GET);
$query="DELETE FROM order_products where orders_products_id='$orders_products_id'";
$result=mysqli_query($conn,$query);
header('location:viewsorders.php');

?>