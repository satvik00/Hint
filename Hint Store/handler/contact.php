<?php
include("../partials/connect.php");
$email=$_POST['email'];
$msg=$_POST['msg'];

$sql="Insert into contact(email,message) VALUES('$email','$msg')";
$connect->query($sql);
?>