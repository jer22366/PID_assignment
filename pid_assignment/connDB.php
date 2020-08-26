<?php
 $link = mysqli_connect("localhost","root","root","shoppingDB")or die ( mysqli_connect_error() );
 $result=mysqli_query($link,"set names utf-8");
?>