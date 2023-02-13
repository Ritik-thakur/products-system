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
      <th scope="col">products_id</th>
      <th scope="col">sku</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">delete</th>
      <th scope="col">update</th>
      <td><a href="products.php"><input type="button" class="btn btn-primary" value="Add Product"></a></td>
    </tr>
    <?php
    $conn=mysqli_connect("localhost","root","","Project");
    $query="SELECT *FROM products";
    $result=mysqli_query($conn,$query);

    while($res=mysqli_fetch_array($result)){
      
    ?>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $res['products_id'];?></th>
      <td><?php echo $res['sku'];?></td>
      <td><?php echo $res['name'];?></td>
      <td><?php echo $res['price'];?></td>
      <td><a href="delete.php?products_id=<?php echo $res['products_id'];?>"><input type="button" class="btn btn-primary" value="delete"></a></td>
      <td><a href="update.php?products_id=<?php echo $res['products_id'];?>"><input type="button" class="btn btn-primary" value="update"></a></td>
    </tr>
    <?php }?>
  </tbody>
</table>
</body>
</html>