<?php
include 'config.php';
	if (isset($_POST['status'])) {
			$status = $_POST['status'];
			$id = $_POST['id'];
		
		$sql = "UPDATE orders SET order_status = '$status'  WHERE order_number = '$id'";
		mysqli_query($con, $sql);

		header('location:orders.php');
	}
?>