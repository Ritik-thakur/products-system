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
      <th scope="col">order_id</th>
      <th scope="col">date purchased</th>
      <th scope="col">action</th>

    </tr>
    <?php
    $conn=mysqli_connect("localhost","root","","Project");
    $query="SELECT * FROM `orders` ORDER BY `orders`.`order_id` DESC   ";
    $result=mysqli_query($conn,$query);
    while($res=mysqli_fetch_array($result)){
    ?>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $res['order_id'];?></th>
      <td><?php echo $res['date_purchased'];?></td>
      <td><a href="manage.php?order_id=<?php echo $res['order_id'];?>"><input type="button" class="btn btn-primary" value="manage"></a></td>
    </tr>
    <?php }?>
  </tbody>
</table>
</body>
</html>