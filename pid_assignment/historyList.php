<?php
    session_start();
    require_once ("connDB.php");
    $account=$_SESSION["account"];
    $password=$_SESSION["password"];

    $sqlcommand = <<<sql
        SELECT account,productname,amount,(f.price*amount) as price,orderDate FROM `orders` e 
        join order_detial f on e.orderid=f.orderId 
        join products g on f.productId=g.productId where account="$account"
     sql;
     $result=mysqli_query($link,$sqlcommand);
     
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- <script src="scripts/jquery-1.9.1.min.js"></script>
  <script src="scripts/jquery.mobile-1.3.2.min.js"></script> -->
</head>
<body>

<div class="container"> 
<form method="POST">
  <div class="form-inline col-12" >
      <h2 class=col-10>Shoppingcart List</h2>
  </div>
</form>
  <table class="table table-hover">
    <thead>

      <tr>
        <th>account</th>
        <th>productname</th>
        <th>amount</th>
        <th>price</th>
        <th>orderDate</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($result)){?>
        <tr>
            <td><?php echo $row["account"] ?></td>
            <td><?php echo $row["productname"] ?></td>
            <td><?php echo $row["amount"] ?></td>
            <td><?php echo $row["price"] ?></td>
            <td><?php echo $row["orderDate"] ?></td>
        <td>
            <span class="float-right">      
            </span>
        </td>
      </tr>
      
   <?php }?>
    </tbody>
  </table>
</div>
<form method="POST" action="shoppingcar.php">
<div class="form-group col">
  <div class=text-center>
    <button name="btnback" type="submit" class="btn btn-primary">返回</button>
</div>
</body>
</html>