<?php
require_once ("connDB.php");
session_start();
$account=$_SESSION["account"];
$commandText = <<<SqlQuery
select productId, productname, price, img  from products
SqlQuery;

$result = mysqli_query ( $link, $commandText );
$cnt = <<<sql
    select count(account) as cnt from shoppingcart where account="$account";
sql;
$cntresult=mysqli_query($link,$cnt);
$shopcnt=mysqli_fetch_assoc($cntresult);	
if(isset($_POST["addshopping"])){
	header("location: shoppingcar.php");
}
if(isset($_POST["logout"])){
	session_destroy();
	header("location: index.php");
}
if(isset($_POST["login"])){
	header("location: login.php");
}
if(isset($_POST["shoppinghistory"])){
	header("location: historyList.php");
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab</title>

<meta name="viewport" content="width=device-width,initial-scale=1" />
<!-- <script src="scripts/jquery-1.9.1.min.js"></script>
<script src="scripts/jquery.mobile-1.3.2.min.js"></script> -->
<link rel="stylesheet" href="scripts/jquery.mobile-1.3.2.min.css" />
<link rel="stylesheet" href="styles.css" />


</head>
<body>
<div data-role="page" data-theme="c">
<form method="POST">
<div data-role="header">

	<h1>shopping form</h1>
	<?php if ($shopcnt["cnt"]!=0){ ?>
		<button name="addshopping" type="submit " class="btn btn-primary ui-btn-right" >購物車</button>
	<?php }else{ ?>
		<button name="addshopping" type="submit " class="btn btn-primary ui-btn-right" disabled="disabled">購物車</button>
	<?php }?>
	<?php if(!empty($_SESSION["account"]) && !empty($_SESSION["password"])) { ?>
		<button name="logout" type="submit" class="btn btn-primary ui-btn-right">登出</button>
	<?php }else{?>
		<button name="login" type="submit" class="btn btn-primary ui-btn-right">登入</button>	
	<?php } ?>			
	<button name="shoppinghistory"" type="submit" class="btn btn-primary ui-btn-right">歷史訂單</button>
</div>

<div data-role="content">
	<ul data-role="listview" data-filter="true">

  <?php while ($row = mysqli_fetch_assoc($result)) : ?>
		<li>
   		<?php if(!empty($_SESSION["account"]) && !empty($_SESSION["password"])) {?>
	   		<a href="productDetails.php?id=<?php echo $row["productId"] ?>"> 
   		<?php }else{?>
			<a href="login.php?"> 
   		<?php }?>
			<img src="images/<?php echo $row["img"]?>" width="150">
			<h5><label for="c1"><span></span><?php echo "名稱:". $row["productname"] . " " . " 價錢:" . $row["price"].""?></h4></label><p>
			<!-- <p><?php echo $row["title"] ?> </p> <span class="ui-li-count"><?php echo $row["reportCount"] ?></span>  -->
		</a>
		</li>
  <?php endwhile ?>
  
	</ul>
</div>

</div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<?php

mysqli_close ( $link );
?>
</body>
</html>