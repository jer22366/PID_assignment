<?php
    require_once("connDB.php");
    if(isset($_POST["submit"])){  
      $Pname = $_POST["productname"];
      $Price = $_POST["price"];
      $Pimg = $_POST["img"];
      $Pstock = $_POST["stock"];
      $sqlcommand=<<<addsql
        insert into products (productname,price,stock,img) 
        values("$Pname",$Price,$Pstock,"$Pimg");
      addsql;
      $result=$sqlcommand;
      mysqli_query($link,$result);
       header("location: manage.php");
    }   
   


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>newdataform</title>
</head>
<body>


<form method="post" >
  <div class="form-group col">
    <label for="text" class="col-5 col-form-label">商品名稱</label> 
    <div class="col-8">
      <input id="text" name="productname" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group col">
    <label for="text1" class="col-4 col-form-label">價位</label> 
    <div class="col-8">
      <input id="text1" name="price" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group col">
    <label for="text1" class="col-4 col-form-label">庫存</label> 
    <div class="col-8">
      <input id="text1" name="stock" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group col">
    <label for="text1" class="col-4 col-form-label">圖片名稱</label> 
    <div class="col-8">
      <input id="text1" name="img" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group col">
    <div class="col-4">
      <button name="submit" type="submit" value="ok" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
</body>
</html>