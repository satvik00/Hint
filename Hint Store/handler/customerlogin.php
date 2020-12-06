<?php
session_start();
include('../partials/connect.php');
if(isset($_POST['login'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="select * from customers where username='$email' and password='$password'";
	$results=$connect->query($sql);
	$final=$results->fetch_assoc();
	$_SESSION['email']=$final['username'];
	$_SESSION['password']=$final['password'];
	
	$_SESSION['customerid']=$final['id'];
	
	if($email=$final['username'] and $password=$final['password']){
		header('location: ../cart.php');
	}else{
		echo "<script>
		alert('Wrong credentials');
		window.location.href='../customerforms.php';
		</script>";
	}
}
?>
