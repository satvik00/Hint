<?php
session_start();
include('../partials/connect.php');
$total=$_POST['total'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$customerid=$_SESSION['customerid'];


$sql="insert into orders(customer_id, address, phone, total) values('$customerid','$address','$phone','$total')";
$connect->query($sql);


$sql2="SELECT id from orders order by id DESC limit 1";
$result=$connect->query($sql2);
$final=$result->fetch_assoc();
$orderid=$final['id'];
$payment=$_POST['payment'];

foreach($_SESSION['cart'] as $key => $value){
	$proid=$value['item_id'];
	$quantity=$value['quantity'];
	$sql3="INSERT INTO order_details(order_id,product_id,quantity) values('$orderid','$proid','$quantity')";
	$connect->query($sql3);
}

if($payment=="paytm"){
	$_SESSION['total']=$total;
	header('location: paytm.php');
}else{/*
	echo "<script>
alert('Order is place');
window.location.href='../index.php';
</script>";*/
}
unset($_SESSION['cart']);

?>