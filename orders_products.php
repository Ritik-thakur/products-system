<?php
$conn=mysqli_connect('localhost',"root","","project");
$sql="SELECT *from products order by name asc";
$res=mysqli_query($conn,$sql);
$conn=mysqli_connect('localhost',"root","","project");
@$products_id=$_POST['order_list'];
@$quantity=$_POST['qty'];
$sql="SELECT * FROM `orders` ORDER BY `orders`.`order_id` DESC";
$result=mysqli_query($conn,$sql);
$r=mysqli_fetch_array($result);
$order_id=$r['order_id'];
$sql="INSERT INTO order_products(order_id,quantity,products_id) Values('$order_id','$quantity','$products_id')";
$result=mysqli_query($conn,$sql);
								


?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Add order</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br /><br />
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<br />			
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">
	<form method="post">
products:<select name="order_list" id="student_list" class="form-control" required onchange="getData(this.options[this.selectedIndex].value)">
								<option value="">Select Products</option>
								<?php while($row=mysqli_fetch_array($res)){?>
								<option value="<?php echo $row['products_id']?>"><?php echo $row['name']?></option>
								<?php } ?>
							</select>
						

						<br>
 <div class="table-responsive" id="user_details" style="display:none">
						<table class="table table-bordered">
							<tr>
                            <td width="10%" align="right"><b>Sku</b></td>
								<td width="90%"><span id="sku"></span></td>
							</tr>
							<tr>
                                <td width="10%" align="right"><b>Name</b></td>
								<td width="90%"><span id="user_name"></span></td>
							
							</tr>
							<tr>
								<td width="10%" align="right"><b>Price</b></td>
								<td width="90%"><span id="price"></span></td>
							</tr>
						</table>
					</div>

						<!-- orders_products_id - auto increment
						order_id - from table orders
						products_id
						quantity	 -->
					<div class="col-md-6 ">
					<div class="form-group">
								
								<div class="form-group">
								<lable for="Quantity"><b>Quantity</lable></b>
								<input type="number" name="qty" class="form-control" min='1' required>
								</div><br>
								<button type="submit" class="btn btn-success" >ADD TO CART</button><br><br>
								<a href="viewsorders.php"><input type="button" class="btn btn-primary" VALUE="ViewsOrders"></a>
								</div>
				</div>
			</div>
		</div>
		
<script>
		function getData(products_id){
			if(products_id==''){
				jQuery('#user_details').hide();
			}else{
				jQuery.ajax({
					url:'getData.php',
					type:'post',
					data:'products_id='+products_id,
					success:function(result){
						var json_data=jQuery.parseJSON(result);
						jQuery('#user_details').show();
                        jQuery('#sku').html(json_data.sku);
						jQuery('#user_name').html(json_data.name);		
						jQuery('#price').html(json_data.price);
					}

				})
			}
		}
		</script>
	

	</body>
</html>