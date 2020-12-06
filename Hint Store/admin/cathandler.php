<?php
include("../partials/connect.php");
$category=$_POST['name'];


$sql="Insert into categories(name) VALUES('$category')";
$connect->query($sql);

header('location: productshow.php');
?>