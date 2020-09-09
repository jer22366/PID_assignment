<?php
    require_once("../connDB.php");
    if (file_exists('upload/' . $_FILES['my_file']['name'])){
      echo '檔案已存在。<br/>';
    } else {
    $file =$_FILES['my_file']['tmp_name'];
    $dest ='../images/'.$_FILES['my_file']['name'];
    
    # 將檔案移至指定位置
    move_uploaded_file($file, $dest);
    echo $dest;
   }


    $id=$_GET["id"];
      $selectcommand=<<<addsql
        select * from products where productId=$id;
      addsql;
      $result=mysqli_query($link,$selectcommand);
      $row=mysqli_fetch_assoc($result);
      $Pname = $_POST["productname"];
      $Price = $_POST["price"];
      $Pimg = $_FILES['my_file']['name'];
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


<form method="post" enctype="multipart/form-data">
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
        <input type="file" name="my_file">
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