<?php
include('../partials/connect.php');
if(isset($_POST['update'])){
	$newid=$_POST['form_id'];
	
	
	$newname=$_POST['name'];
	$newprice=$_POST['price'];
	$newdesc=$_POST['description'];
	$newcat=$_POST['category'];
	
	$target="uploads/";
	$file_path=$target.basename($_FILES['file']['name']);
	$file_name=$_FILES['file']['name'];
	$file_tmp=$_FILES['file']['tmp_name'];
	$file_store="uploads/".$file_name;

	move_uploaded_file($file_tmp,$file_store);


	$sql="update products set name='$newname', price='$newprice', description='$newdesc', category_id='$newcat' ,picture='$file_path' where id='$newid'";
	$connect->query($sql);
	if($connect->query($sql)){
		header('location: productshow.php');
	}else{
		header('location: adminindex.php');
	}
	
}

?>