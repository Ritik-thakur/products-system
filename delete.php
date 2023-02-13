<?php
$conn=mysqli_connect("localhost","root","","Project");
extract($_GET);
$query="DELETE FROM products where products_id='$products_id'";
$result=mysqli_query($conn,$query);
header('location:view.php');

?>