<?php
$id = $_GET['id'];

include('config.php');

$sql = "DELETE FROM customers WHERE customer_id=$id";

if (mysqli_query($con, $sql)) {
    echo ("<script>
            window.alert('Data Deleted successfully');
            window.location.href='customerdetails.php';
            </script>");
} else {
    die("not deleted" . mysqli_error($con));
}
?>