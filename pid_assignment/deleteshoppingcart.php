<?php 
require("connDB.php");
if(!isset($_GET["id"])){
    die("id not found");
}
$id = $_GET["id"];
if(! is_numeric($id))
    die("id not a number");
$sql = <<<multi
    delete from shoppingcart where ID=$id;
multi;
$result=$sql;
mysqli_query($link,$result);
header("location:shoppingcar.php");
?>