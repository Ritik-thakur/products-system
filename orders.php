<?php
$conn=mysqli_connect("localhost","root","","Project");
if(isset($_POST['submit'])){
        $sql="INSERT INTO orders(date_purchased) Values(NOW())";
        $result=mysqli_query($conn,$sql);
        if($result==true){
            header('location:orders_products.php');
            
        }    
        
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders</title>
<style>
.error{color:#ff0000;}
</style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="rows">
        <div class="cols-lg-15 m-auto">
            <form method="post">
                <div class="card">
                    <div class="card-header bg-light">
                        <h1 class="text-center text-black">Orders</h1>
                         
                        <button type="submit" class="btn btn-success" name="submit">AddOrder</button>
                        <!-- <a href="orders_products.php"><input type="button" class="btn btn-primary" VALUE="orders_products"></a> -->
                        </div>
                </div>
        </div>
    </div>
    </div>
</body>
</html>


