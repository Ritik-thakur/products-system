<?php
@$sku=$_POST['sku'];
@$name=$_POST['name'];
@$price=$_POST['price'];
$conn=mysqli_connect("localhost","root","","Project");
$quer="SELECT *FROM products where sku='$sku' ";
$result=mysqli_query($conn,$quer);
$e=mysqli_num_rows($result);
if(mysqli_num_rows($result)>0){
    echo "<span class='text-danger'>Sku already Exist</span>";
}else{

    echo "<span class='text-success'>Sku available</span>"; 
}




?>