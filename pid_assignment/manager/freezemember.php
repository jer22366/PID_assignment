<?php
require_once ("../connDB.php");

if(!isset($_GET["freezeid"])){
    die("freezeid not found");
}
$id = $_GET["freezeid"];
if(!is_numeric($id))
    die("freezeid not a number");  


$sqlcommand = <<<sql
    select * from member where id=$id;
sql;
$result=mysqli_query($link,$sqlcommand);

$row = mysqli_fetch_assoc($result);
if($row["freeze"]==1){
    $freeze = <<<sql
        UPDATE `member` SET `freeze` = '0' WHERE `member`.`id` = $id;
    sql;
    $FreezeResult=mysqli_query($link,$freeze);
}else if($row["freeze"]==0){
    $freeze = <<<sql
        UPDATE `member` SET `freeze` = '1' WHERE `member`.`id` = $id;
    sql;
    $FreezeResult=mysqli_query($link,$freeze);  
}
header("location: manage.php");
?>