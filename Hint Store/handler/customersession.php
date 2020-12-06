<?php

if(empty($_SESSION['email'] and $_SESSION['password'])){
	echo "<script>
	alert('please login');
	window.location.href='customerforms.php';
	</script>";
}

?>