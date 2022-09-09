<?php
$id = $_GET['id'];

include('config.php');

$sql = "DELETE FROM orders WHERE  order_number=$id";

if (mysqli_query($con, $sql)) {
    echo ("<script>
            window.alert('Data Deleted successfully');
            window.location.href='orders.php';
            </script>");
} else {
    die("not deleted" . mysqli_error($con));
}
?>