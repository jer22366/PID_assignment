<?php
    require_once ("connDB.php");
    session_start();
    $account=$_SESSION["account"];
    
    mysqli_query($link,"set names utf-8");
    $sqlcommand = <<<sql
        select id,account,e.productname,amount,(price * amount) as "price" from shoppingcart e 
        join products f on e.productId=f.productId where account="$account";
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
    
  <h2>Shoppingcart List</h2>
  <!-- <a href="addproduct.php" class="btn btn-outline-success btn-sm float-right">new</a> -->
  <table class="table table-hover">
    <thead>

      <tr>
        <th>id</th>
        <th>account</th>
        <th>productname</th>
        <th>amount</th>
        <th>price</th>
      </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($result)){?>
        <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["account"] ?></td>
            <td><?php echo $row["productname"] ?></td>
            <td><?php echo $row["amount"] ?></td>
            <td><?php echo $row["price"] ?></td>
        <td>
            <span class="float-right">
                <a href="editform.php?id=<?= $row["id"]?>" class="btn btn-outline-success btn-sm">edit</a>
                <a href="deleteshoppingcart.php?id=<?= $row["id"]?>" class="btn btn-outline-danger btn-sm">delete</a>
                
            </span>
        </td>
      </tr>
      
   <?php }?>
    </tbody>
  </table>
</div>
<div class="form-group col">
  <div class=text-center>
    <button name="btnok" type="submit" class="btn btn-primary text-center">確定</button>
    <button name="btnback" type="submit" class="btn btn-primary text-center">返回</button>
</div>
</body>
</html>
