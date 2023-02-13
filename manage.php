<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Sku</th>
      <th scope="col">Name</th>
      <th scope="col">quantity</th>
      <th scope="col">Action</th>

    </tr></thead>
    <?php
    $conn=mysqli_connect("localhost","root","","Project");
    extract($_GET);
    $query="SELECT *FROM orders where order_id='$order_id'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result);
    $date_purchased=$row['date_purchased'];
    echo "<b>Order ID</b>: $order_id    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b>Date Purchased</b>: $date_purchased <br><br>";
    $query="select p.sku,p.name,op.quantity,op.orders_products_id from order_products op right join products p on op.products_id=p.products_id where op.order_id='$order_id'";
    $result=mysqli_query($conn,$query);
    
    while($re=mysqli_fetch_array($result)){
      
    
 
        ?>





    
    <tr>
  
     
      
       <td><?php 
        
       echo $re['sku'] ;?></td>
      <td><?php echo $re['name']; ?></td>
      <td><?php echo $re['quantity'];?></td>
      <td><a href="delet1.php?orders_products_id=<?php echo $re['orders_products_id'] ;?>"><input type="button" class="btn btn-primary" value="Delete"></a></td>
    </tr>
   
    
    <?php }?>


    
  
 
</table>
</body>
</html>