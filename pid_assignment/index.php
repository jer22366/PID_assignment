<?php 
	  require("connDB.php");
    session_start();
    if(isset($_POST["btnlogin"])){
      $account=$_POST["account"];
      $passowrd=$_POST["password"];
      if(empty($account) || empty($passowrd)){
        header("location: index.php");
      }
      else{
        $result = mysqli_query ( $link, "set names utf8" );
        mysqli_select_db ( $link, $dbname );
        $commandText = <<<sqlcommand
          select * from member where account="$account";
        sqlcommand;

        $result = mysqli_query ( $link, $commandText );
        $row = mysqli_fetch_assoc ( $result );

        $_SESSION["account"]=$account;
        $_SESSION["password"]=$passowrd;  

        if($row["account"]==$account && $row["acpassword"]==$passowrd)
          header("location: shopform.php");    
      }
      
         
    }
    if(isset($_POST["btnregister"])){
      header("location: register.php");
    }  
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form method="POST" action="index.php">
  <div class="form-group row">
    <label for="account" class="col-4 col-form-label">帳號</label> 
    <div class="col-8">
      <input id="account" name="account" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-4 col-form-label">密碼</label> 
    <div class="col-8">
      <input id="password" name="password" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="btnlogin" type="submit" class="btn btn-primary">登入</button>
      <button name="btnregister" type="submit" class="btn btn-primary">註冊會員</button>
      <button name="btnreset" type="reset" class="btn btn-primary">重置</button>
    </div>
  </div>
</form>
