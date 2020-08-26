<?php 
if(!isset($_GET["id"])){
    die("id not found");
}
$id = $_GET["id"];
if(! is_numeric($id))
    die("id not a number");

if(isset($_POST["submit"])){
  $Amount = $_POST["amount"];
  
  $sql=<<<multi
        update shoppingcart set amount='$Amount'
        where id = $id;
      multi; 
  require("connDB.php");
  $result=$sql;
  mysqli_query($link,$result);
  header("location: shoppingcar.php");
}else{
  
  // $sql = <<<multi
  //   select * from employees where id=$id;
  // multi;
  // $result = mysqli_query($link,$sql);
  // $row = mysqli_fetch_assoc($result);
}
if(isset($_POST["btnback"])){
  header("location: shoppingcar.php");
 }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scripts/jquery-1.9.1.min.js"></script>
    <!-- <script src="scripts/jquery.mobile-1.3.2.min.js"></script>
    <link rel="stylesheet" href="scripts/jquery.mobile-1.3.2.min.css" /> -->
    <link rel="stylesheet" href="styles.css" />
    <title>Editform</title>
</head>
<body>


<form method="POST">
  <div class="form-group col">
    <label for="text" class="col-5 col-form-label">數量</label> 
    <div class="col-8">
      <input id="text" name="amount" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group col">
    <div class="col-5">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      <button name="cancel" type="reset" class="btn btn-primary">cancel</button>
      <button name="btnback" type="submit" class="btn btn-primary">back</button>
    </div>
  </div>
</form>
</body>
</html>