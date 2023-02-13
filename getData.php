<?php
$conn=mysqli_connect('localhost',"root","","project");
$products_id=$_POST['products_id'];
$sql="SELECT *FROM products where products_id='$products_id'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res)){
    $arr=$row;
}
echo json_encode($arr);

?>
