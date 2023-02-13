<?php
session_start();
echo "Hello".$_SESSION['name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Creation From</title>
    <style>
    .error{color:#ff0000;}
    h1{
        font-family:'Ariel';
        
    }
    p1{
        font-family:'VERDANA';
    }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>
<body>

<?php
$skuerr="";
@$sku=$_POST['sku'];
@$name=$_POST['name'];
@$price=$_POST['price'];
$conn=mysqli_connect("localhost","root","","Project");
$quer="SELECT *FROM products where sku='$sku' ";
$result=mysqli_query($conn,$quer);

if((count($_POST)!=0)){
    $query="INSERT INTO products(sku,name,price) VALUES('$sku','$name','$price')";
    $result=mysqli_query($conn,$query);
    if($result==true){
        echo "<span class='text-success'>Successfully Submit</span>";
    }else{
        echo "failed";
    }
       
}

?>

<div class="container">
    <div class="rows">
        <div class="cols-lg-15 m-auto">
            <form method="post" >
            <div class="card">
                <div class="card-hearder bg-light">
                    <h1 class="text-center text-grey"><u>Create Products</u></h1>
                    <div class="form-group">
                        <lable for="sku"><p1>Sku</lable></p1>
                         <input type="text" name="sku" id= "srku" class="form-control"  required  value="<?php
                         if($skuerr=="already exist"){ echo @$_POST['sku'];}else{echo "";}?>">
                          <span id="msg"></span>
                         <div class="form-group">
                        <lable for="name"><p1>name</lable></p1>
                        <input type="text" name="name" class="form-control" required  id="nam" value="<?php
                         if($skuerr=="already exist"){ echo @$_POST['name'];}else{echo "";}?>">
                       
                         <div class="form-group">
                        <lable for="price"><p1>price</lable></p1>
                        <input type="text" name="price" class="form-control"  id="pric" required   value="<?php
                         if($skuerr=="already exist"){ echo @$_POST['price'];}else{echo "";}?>">
                        
                    </div>
                    <button type="submit" class="btn btn-success"  id="btn">Submit</button>
                    <a href="view.php"><input type="button" class="btn btn-primary"  VALUE="View"></a>
                    <a href="orders.php"><input type="button" class="btn btn-secondary " VALUE="Orders"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="Js/jquery.js"></script>
    <script type="text/javascript">
$(document).ready(function(){

  //keyup in email.
  $('#srku').keyup(function(){
    var input =$(this).val();
    
    if(input !=""){
      $.ajax({
        url:"valid.php",
        method:"POST",
        data:{input:input},
        success:function(data){
    //   $('#msg').html(data);
    //   $('#msg').css('display','block')
      if(data !="0"){
        $('#msg').html('<span class="text-danger">sku already exist</span>');
        $('#msg').css('display','block');
         $('#btn').attr("disabled",true);
      
      }else{
        $('#msg').html('<span class="text-success">sku available</span>');
        $('#btn').attr("disabled",false);
        $('#msg').css('display','block');

      }

        }


      })

    }else{
      $('#msg').css('display','none')
      $('#btn').attr("disabled",false);

    }
    buttonState();


})

      


})

function buttonState(){

if(data!=0){
$('#btn').show();
}


}

</script>
</body>
</html>