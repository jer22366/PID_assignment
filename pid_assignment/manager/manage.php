<?php
  require_once ("../connDB.php");
  $sqlcommand = <<<sql
    select * from member;
  sql;
  $result=mysqli_query($link,$sqlcommand);
  if(isset($_POST["btnback"])){
    header("location: ../login.php");
  }
  if(isset($_POST["BtnAddProduct"])){
    header("location: Addproduct.php");
  }
  if(isset($_POST["BtnProductlist"])){
    header("location: productlist.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/jquery/jquery.form.js"></script> 
    <script type="text/javascript" src="/js/jquery/jquery-1.8.0.min.js"></script>  
    <title>Document</title>
</head>
<body>
<div class="container"> 
<form method="POST">
  <div class="form-inline col-12" >
      <h2 class=col-8>Shoppingcart List</h2>
      <button name="BtnAddProduct" type="submit" class="btn btn-primary col-2">新增商品</button>
      <button name="BtnProductlist" type="submit" class="btn btn-warning col-2">商品列表</button>
  </div>
</form>
  <table class="table table-hover">
    <thead>

      <tr>
        <th>account</th>
        <th>name</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($result)){?>
        <tr>
            <td><?php echo $row["account"] ?></td>
            <td><?php echo $row["name"] ?></td>
        <td>
            <span class="float-right">
            <a href="managercheckList.php?id=<?= $row["account"]?>" class="btn  btn-info">查看訂單</a>
            <?php if($row["freeze"]==1){ ?>
              <a href="freezemember.php?freezeid=<?= $row["id"]?>" class="btn btn-success btn-sm">停用</a>
            <?php }else if($row["freeze"]==0){?>
              <a href="freezemember.php?freezeid=<?= $row["id"]?>" class="btn btn-success btn-sm">開啟</a>
            <?php } ?>
              <a href="deletemember.php?delete=<?= $row["id"]?>" class="btn btn-danger btn-sm">刪除</a>
            </span>
        </td>
      </tr>
   <?php }?>
    </tbody>
  </table>
</div>
<form method="POST" action="manage.php">
<div class="form-group col">
  <div class=text-center >
    <button name="btnback" type="submit" class="btn btn-primary">登出</button>
</div>
</body>
</html>