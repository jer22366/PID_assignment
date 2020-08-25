<?php 
if(!isset($_GET["id"])){
    die("id not found");
}
$id = $_GET["id"];
if(! is_numeric($id))
    die("id not a number");
$sql = <<<multi
    delete from shoppingcart where ID=$id;
multi;
// require("connDB.php");
// $result=$sql;
// mysqli_query($link,$result);
// header("location: index.php");
?>