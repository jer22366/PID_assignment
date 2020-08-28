<?php
    require_once("connDB.php");
    $id=$_GET["id"];
      $selectcommand=<<<addsql
        select * from products where productId=$id;
      addsql;
      $result=mysqli_query($link,$selectcommand);
      $row=mysqli_fetch_assoc($result);
      $Pname = $_POST["productname"];
      $Price = $_POST["price"];
      $Pimg = $_POST["img"];
      $Pstock = $_POST["stock"];
    if(isset($_POST["btnedit"])){  
      
      $sqlcommand=<<<addsql
            UPDATE `products` SET `productname` = "$Pname",price=$Price,stock=$Pstock,img="$Pimg" WHERE `products`.`productId` = $id;
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
      <input id="text" name="productname" type="text" class="form-control" placeholder=<?= $row["productname"] ?>>
    </div>
  </div>
  <div class="form-group col">
    <label for="text1" class="col-4 col-form-label">價位</label> 
    <div class="col-8">
      <input id="text1" name="price" type="text" class="form-control" placeholder=<?= $row["price"] ?>>
    </div>
  </div>
  <div class="form-group col">
    <label for="text1" class="col-4 col-form-label">庫存</label> 
    <div class="col-8">
      <input id="text1" name="stock" type="text" class="form-control" placeholder=<?= $row["stock"] ?>>
    </div>
  </div>
  <div class="form-group col">
    <label for="text1" class="col-4 col-form-label">圖片名稱</label> 
    <div class="col-8">
      <input id="text1" name="img" type="text" class="form-control" placeholder=<?= $row["img"]?>>
    </div>
  </div>
  <div class="form-group col">
    <div class="col-4">
      <button name="btnedit" type="submit" value="edit" class="btn btn-primary">修改</button>
    </div>
  </div>
</form>
</body>
</html>