<?php
session_start();
$_SESSION['name']="Ritik";
$_SESSION['password']="Ritik123$##";
if(isset($_POST['submit'])){
    if($_POST['name']==$_SESSION['name'] && $_POST['password']==$_SESSION['password'] ){
      header('location:products.php');
    }else{
      echo "Sorry you enter wrong Data!";

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header bg-light">
            <h1 class="text-center text-black">Admin Login</h1>
<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name"  required >
    </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password"  required>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>
</div>
</div>
<hr>
<?php
echo "<p align='center'>&copy;Copyright 2000-".date('Y');


?>

</body>
</html>