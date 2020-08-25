<?php 
if(!isset($_GET["id"])){
    die("id not found");
}
$id = $_GET["id"];
if(! is_numeric($id))
    die("id not a number");

if(isset($_POST["submit"])){
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $cityid = $_POST["cityid"];
  
  // $sql=<<<multi
  //       update employees set firstName ='$firstName',lastName='$lastName',cityID='$cityid'
  //       where id = $id;
  //     multi; 
  // require("connDB.php");
  // $result=$sql;
  // mysqli_query($link,$result);
  header("location: index.php");
}else{
  
  // $sql = <<<multi
  //   select * from employees where id=$id;
  // multi;
  // $result = mysqli_query($link,$sql);
  // $row = mysqli_fetch_assoc($result);
}
if(isset($_POST["btnback"])){
  header("location: index.php");
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
    <label for="text" class="col-5 col-form-label">FirstName</label> 
    <div class="col-8">
      <input id="text" name="firstName" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group col">
    <label for="text1" class="col-4 col-form-label">LastName</label> 
    <div class="col-8">
      <input id="text1" name="lastName" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group col">
    <div class="col-4"></div> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="cityid" id="radio_0" type="radio" checked="checked" class="custom-control-input" value="2"
        <?= ($row["cityId"]== 2)? "checked" : "" ?>
        > 
        <label for="radio_0" class="custom-control-label">Taipei</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="cityid" id="radio_1" type="radio" class="custom-control-input" value="6"
        <?= ($row["cityId"]== 6)? "checked" : "" ?>
        > 
        <label for="radio_1" class="custom-control-label">TaiNei</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="cityid" id="radio_2" type="radio" class="custom-control-input" value="4"
         <?= ($row["cityId"]== 4)? "checked" : "" ?>
        > 
        <label for="radio_2" class="custom-control-label">Taichung</label>
      </div>
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