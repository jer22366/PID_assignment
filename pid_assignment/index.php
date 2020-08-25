<?php
require ("config.php");

$link = mysqli_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysqli_connect_error() );
$result = mysqli_query ( $link, "set names utf8" );
mysqli_select_db ( $link, $dbname );
$commandText = <<<SqlQuery
select id, firstName, lastName, title, picture,
  (select count(*) from employee where managerId = e.id) as reportCount
  from employee e
SqlQuery;

$result = mysqli_query ( $link, $commandText );
if(isset($_POST["addshopping"])){
	header("location: shoppingcar.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab</title>

<meta name="viewport" content="width=device-width,initial-scale=1" />
<script src="scripts/jquery-1.9.1.min.js"></script>
<!-- <script src="scripts/jquery.mobile-1.3.2.min.js"></script>
<link rel="stylesheet" href="scripts/jquery.mobile-1.3.2.min.css" /> -->
<link rel="stylesheet" href="styles.css" />
</head>
<body>
<div data-role="page" data-theme="c">
<form method="POST">
<div data-role="header">

	<h1>Employee Details</h1>
	<button name="addshopping" type="submit" class="btn btn-primary ui-btn-right">加入購物車</button>	
</div>

<div data-role="content">
	<ul data-role="listview" data-filter="true">
	<?php while ($row = mysqli_fetch_assoc($result)) : ?>
		<li>
		<a href="employeeDetails.php?id=<?php echo $row["id"] ?>"> 
			<img src="images/<?php echo $row["picture"]?>">
			<h4><?php echo $row["firstName"] . " " . $row["lastName"] ?></h4>
			<p><?php echo $row["title"] ?> </p> <span class="ui-li-count"><?php echo $row["reportCount"] ?></span>
		</a>
		</li>
		<div class="custom-controls-stacked">
        <div class="custom-control custom-radio">
          <input name="radio" id="radio_0" type="radio" class="custom-control-input" value="rabbit"> 
          <label for="radio_0" class="custom-control-label">Rabbit</label>
        </div>
      </div>
	<?php endwhile ?>
	</ul>
</div>

</div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form>
  <div class="form-group row">
    <div class="col-4"></div> 
    <div class="col-8">
      
      <div class="custom-controls-stacked">
        <div class="custom-control custom-radio">
          <input name="radio" id="radio_1" type="radio" class="custom-control-input" value="duck"> 
          <label for="radio_1" class="custom-control-label">Duck</label>
        </div>
      </div>
      <div class="custom-controls-stacked">
        <div class="custom-control custom-radio">
          <input name="radio" id="radio_2" type="radio" class="custom-control-input" value="fish"> 
          <label for="radio_2" class="custom-control-label">Fish</label>
        </div>
      </div>
    </div>
  </div> 
</form>

<?php
mysqli_close ( $link );
?>
</body>
</html>