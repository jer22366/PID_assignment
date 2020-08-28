<?php 
require("../connDB.php");
if(!isset($_GET["delete"])){
    die("deleteid not found");
}
$id = $_GET["delete"];
if(! is_numeric($id))
    die("deleteid not a number");
$sql = <<<multi
    delete from member where ID=$id;
multi;
$result=$sql;
mysqli_query($link,$result);
header("location:manage.php");
?>