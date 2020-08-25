<?php 
	// require_once ("config.php");
	// require("connDB.php");
    session_start();
    if(isset($_POST["submit"])){
        $username=$_POST["account"];
        $userpass=$_POST["password"];
        if(empty($username) || empty($userpass)){
        }
        else{
			// $link=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die(mysqli_connect_error());
			// $result = mysqli_query ( $link, "set names utf8" );
			// mysqli_select_db ( $link, $dbname );
			// $commandText = <<<sqlcommand
			// 	select * from member where account="$username";
			// sqlcommand;
			// $result = mysqli_query ( $link, $commandText );
            // $row = mysqli_fetch_assoc ( $result );
            $_SESSION["user"]=$username;
			$_SESSION["pass"]=$userpass;
			// $_SESSION["idcnum"]=$row["idCnum"];
			// if($row["account"]!="" && $row["acpassword"]==$userpass){
				
			// }
            header("location: index.php");
        }
        
         
    }
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form method="POST" action="login.php">
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
      <button name="submit" type="submit" class="btn btn-primary">登入</button>
      <button name="submit" type="reset" class="btn btn-primary">重置</button>
    </div>
  </div>
</form>
