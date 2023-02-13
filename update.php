<?php
$skuerr=$nameerr=$priceerr="";
@$sku=$_POST['sku'];
@$name=$_POST['name'];
@$price=$_POST['price'];
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(empty($_POST['sku'])){
        $skuerr="REQUIRED";
    }
    if(empty($_POST['name'])){
        $nameerr="REQUIRED";
    }
    if(empty($_POST['price'])){
        $priceerr="REQUIRED";
    }

}
$conn=mysqli_connect("localhost","root","","project");
extract($_GET);
$query="SELECT *FROM products where products_id='$products_id'";
$result=mysqli_query($conn,$query);
$res=mysqli_fetch_array($result);

if((count($_POST)!=0) and  ($skuerr=="")and ($priceerr=="")and( $nameerr==""))
{
    extract($_POST);
    extract($_GET);
    $query="UPDATE  products SET sku='$sku', name='$name',price='$price' WHERE products_id='$products_id' ";
    $result=mysqli_query($conn,$query);
    if($result==True){
        echo "";
    }else{
        echo "failed";
    }


}
echo $nameerr;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
    .error{color:#ff0000;}
    </style>
</head>
<body>
    <div class="container">
        <div class="rows">
            <div class="col-lg-16 m-auto">
                <form method="post">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h1 class="text-center text-black">Update-form</h1>
                        </div>
                        <div class="form-group">
                            <lable for="sku">sku</lable>
                            <input type="text" name="sku" class="form-control" value="<?php
                            if(isset($_POST['submit'])){
                                echo @$sku;
                            }
                           else{echo $res['sku'];}?>">
                            <span class="error">*<?php echo $skuerr;?></span>
                        </div>
                        <div class="form-group">
                            <lable for="name">name</lable>
                            <input type="text" name="name" class="form-control" value="<?php 
                             if(isset($_POST['submit'])){
                                echo @$name;
                            }
                           else{echo $res['name'];}?>">
                            <span class="error">*<?php echo $nameerr;?></span>
                        </div>
                        <div class="form-group">
                            <lable for="price">price</lable>
                            <input type="number" name="price" class="form-control" value="<?php 
                             if(isset($_POST['submit'])){
                                echo @$price;
                            }
                           else{echo $res['price'];}?>">
                            <span class="error">*<?php echo $priceerr;?></span>
                        </div>
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                        <a href="view.php"><input type="button" class="btn btn-primary" value="viewdetails"></a>
</form>

                    </div>
                   
            </div>
        </div>
    </div>
</body>
</html>