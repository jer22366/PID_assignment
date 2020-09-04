<?php
session_start();
require_once("../connDB.php");
$account=$_SESSION["account"];
if (! isset ( $_GET ["id"] ))
	die ( "Parameter id not found." );

$id = $_GET ["id"];
if (! is_numeric ( $id ))
	die ( "id not a number." );



$commandText = <<<SqlQuery
select * from products where productId=$id;
SqlQuery;

$result = mysqli_query ( $link, $commandText );
$row = mysqli_fetch_assoc ( $result );



if(isset($_POST["submit"])){
	$inserttext = <<<SqlQuery
		select stock from products
	SqlQuery;
	$sumstock = mysqli_fetch_assoc(mysqli_query ( $link, $inserttext ));

	$amount=$_POST["Amount"];
	if($amount>$sumstock["stock"]){?>
		<script>alert("超過庫存了")</script>
		
	<?php }else{
		$productname=$row["productname"];
		$inserttext = <<<SqlQuery
		INSERT INTO `shoppingcart`(account, productId, productname, amount) 
		VALUES ("$account",$id,"$productname",$amount);
		SqlQuery;
		$result = mysqli_query ( $link, $inserttext );
		header("location: ../index.php");
	 }	
}
mysqli_close($link);
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
    <div class="action-list"></div>
	<div data-role="page" data-add-back-btn="true" data-theme="c">
		<div data-role="header">
			<h1>Product Details</h1>
		</div>
		<div data-role="content">
			<img src="../images/<?php echo $row["img"] ?>" class="product-pic" width="100" />
			<div class="product-details">
				<h3><?php echo "名稱:"." ".$row["productname"] ?></h3>
				<p><?php echo "價錢:"." ".$row["price"] ?></p>
				<p><?php echo "庫存:"." ".$row["stock"] ?></p>
			</div>
			<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

			<form method="POST">
			<div class="form-group">
				<label for="text1">數量</label> 
				<input id="Amount" name="Amount" type="text" class="form-control">
			</div> 
			<div class="form-group">
				<button name="submit" type="submit" class="btn btn-primary">加入購物車</button>
			</div>
			</form>
		</div>
	</div>
</body>
</html>