<?php

$conn=mysqli_connect("localhost","root","","project");
if(isset($_POST['input'])){

$input=$_POST['input'];

$sql="SELECT *FROM products where sku ='{$input}'";
$result=mysqli_query($conn,$sql);
echo mysqli_num_rows($result);

}

// if(mysqli_num_rows($result)>0){

//     echo "<h6 class='text-danger'>Already exist";

// }else{

//     echo "<h6 class='text-success'>available</h6>";
    
//     }

// }


?>